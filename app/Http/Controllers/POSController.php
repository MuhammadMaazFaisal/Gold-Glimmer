<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FinishedProduct;
use App\Models\PosOrder;
use App\Models\PosOrderItem;
use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $products= FinishedProduct::with('product')->get();
        return view('admin.pos.index', compact('customers', 'products'));
    }

    public function posOrderList()
    {
        $orders = PosOrder::with('customer','items')->get();
        return view('admin.pos.list', compact('orders'));
    }

    public function edit($id)
    {
        $order = PosOrder::with('customer','items.product')->find($id);
        $customers = Customer::all();
        $products= FinishedProduct::with('product')->get();
        // dd($order);
        return view('admin.pos.edit', compact('order', 'customers', 'products'));
    }

    public function store(Request $request)
    {
        $order = new PosOrder();
        $order->customer_id = $request->customer;
        $order->total = $request->total;
        $order->save();

        for ($i = 0; $i < count($request->product); $i++) {
            $orderItem = new PosOrderItem();
            $orderItem->pos_order_id = $order->id;
            $orderItem->finished_product_id = $request->product[$i];
            $orderItem->save();
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
}
