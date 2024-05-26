<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FinishedProduct;
use App\Models\Order;
use App\Models\PosOrder;
use App\Models\PosOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $products = FinishedProduct::with('product', 'product.productType')->where('status', 1)->get();
        $orders = Order::with('customer', 'orderDetails')
            ->whereDoesntHave('orderDetails', function ($query) {
                $query->whereHas('product', function ($query) {
                    $query->where('status', '!=', 1);
                });
            })
            ->get();

        return view('admin.pos.index', compact('customers', 'products', 'orders'));
    }

    public function posOrderList()
    {
        $orders = PosOrder::with('customer', 'items')->get();
        return view('admin.pos.list', compact('orders'));
    }

    public function edit($id)
    {
        $order = PosOrder::with('customer', 'items.product')->find($id);
        $customers = Customer::all();
        $products = FinishedProduct::with('product')->get();
        return view('admin.pos.edit', compact('order', 'customers', 'products'));
    }

    public function store(Request $request)
    {
        $order = new PosOrder();
        $order->customer_id = $request->customer;
        $order->total = $request->total;
        $order->advance = $request->advance ?? 0;
        $order->balance = $request->total - ($request->advance ?? 0);
        $order->save();

        for ($i = 0; $i < count($request->product); $i++) {
            $orderItem = new PosOrderItem();
            $orderItem->pos_order_id = $order->id;
            $orderItem->finished_product_id = $request->product[$i];
            $orderItem->save();

            $product = FinishedProduct::find($request->product[$i]);
            $product->status = 0;
            $product->save();

            $customer = Customer::where('id', $request->customer)->first();
            $customer->balance = $customer->balance + $request->total;
            $customer->save();
        }

        $notification = array(
            'message' => 'Order created successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function getProductDetails($id)
    {
        $product = FinishedProduct::with('product')->find($id);
        return response()->json($product);
    }

    public function posOrderDetails($id)
    {
        
        $products = FinishedProduct::with('product', 'product.productType')->where('status', 1)->get();
        $order =Order::with('customer', 'orderDetails', 'orderDetails.product')->where('id', $id)->first();
        $product_ids = $order->orderDetails->pluck('product')->pluck('id');
        $orderProducts = FinishedProduct::with('product')->whereIn('product_id', $product_ids)->where('status', 1)->get();
        $customers = Customer::all();
        if ($orderProducts->count() == 0) {
            $notification = array(
                'message' => 'No product found in this order!',
                'alert-type' => 'error'
            );
            return redirect()->route('pos.index')->with($notification);
        }
        return view('admin.pos.details', compact('order', 'products', 'orderProducts', 'customers'));
    }
}
