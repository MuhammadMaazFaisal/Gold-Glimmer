<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Customer;
use App\Models\FinishedProduct;
use App\Models\VendorType;
use App\Models\OrderDetail;
use App\Models\ProductType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $manufacturers = Vendor::where('type',  VendorType::where('name', 'Manufacturing')->first()->id)->get();
        $customers = Customer::all();
        return view('admin.order.index', compact('manufacturers', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'date' => 'required',
            'weight' => 'required',
            'type' => 'required',
            'purity_text' => 'required',
        ]);

        $order = new Order();
        $order->customer_id = $request->customer;
        $order->advance = $request->advance;
        $order->date = $request->date;
        $order->save();

        $customer = Customer::where('id', $request->customer)->first();
        $customer->balance = $customer->balance - $request->advance;
        $customer->save();

        for ($i = 0; $i < count($request->type); $i++) {
            $product = new Product();
            $id = Product::count() + 1;
            $product->date = $request->date;
            $product->id = 'P-' . str_pad($id, 4, '0', STR_PAD_LEFT);
            $product->product_type = ProductType::where('name', $request->type[$i])->first()->id;
            $product->purity_text = $request->purity_text[$i];
            $product->quantity = $request->quantity[$i];
            $product->unpolished_weight = $request->weight[$i];
            $product->dimension = $request->dimension[$i];
            if (isset($request->image) && $request->image[$i] != null) {
                $image = $request->image[$i];
                $imageName = time() . $i . '.' . $image->extension();
                $image->move(public_path('images/products'), $imageName);
                $product->image = $imageName;
            }
            $product->save();

            $orderDetail = new OrderDetail();
            $orderDetail->o_id = $order->id;
            $orderDetail->p_id = $product->id;
            $orderDetail->save();
        }

        $notification = array(
            'message' => 'Order created successfully.',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function edit($id)
    {

        $orders = Order::where('id', $id)->with('customer', 'vendor', 'orderDetails', 'orderDetails.product', 'orderDetails.product.productType')->first();
        return view('admin.order.edit', compact('orders'));
    }

    public function list()
    {
        $orders = Order::with('customer', 'vendor')->get();
        return view('admin.order.list', compact('orders'));
    }

    public function getOrderDetails($id) 
    {
        $order = Order::where('id', $id)->with('customer', 'orderDetails', 'orderDetails.product', 'orderDetails.product.productType')->first();
        $customers = Customer::all();
        return view('admin.order.details', compact('order', 'customers'));
    }

    public function completeOrder($id)
    {
        $order = Order::where('id', $id)->with('customer', 'orderDetails', 'orderDetails.product', 'orderDetails.product.productType')->first();
        $product_ids=$order->orderDetails->pluck('p_id');
        $products = FinishedProduct::whereIn('product_id', $product_ids)->get();
        // dd($products);
        $customers = Customer::all();

        return view('admin.order.complete', compact('order', 'products', 'customers'));
    }

    public function completeOrderStore(Request $request, $id)
    {

       $products = $request->barcode;
       foreach ($products as $key => $value) {
           $product = FinishedProduct::where('barcode', $value)->first();
           $product->status = 0;
           $product->save();
         }
        $order = Order::where('id', $id)->first();
        $order->status = 'completed';
        $order->total = $request->total;
        $order->save();

        $customer = Customer::where('id', $order->customer_id)->first();
        $customer->balance = $customer->balance + $request->balance;
        $customer->save();

        $notification = array(
            'message' => 'Order completed successfully.',
            'success' => true
        );

        return response()->json($notification);
    }
}
