<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Customer;
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
        $order->date = $request->date;
        $order->save();

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
        $order = Order::where('id', $id)->with('customer', 'vendor', 'orderDetails', 'orderDetails.product', 'orderDetails.product.productType')->first();
        $customers = Customer::all();
        return view('admin.order.details', compact('order', 'customers'));
    }
}
