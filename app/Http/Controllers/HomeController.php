<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FinishedProduct;
use App\Models\Order;
use App\Models\PosOrder;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $finishedProducts = FinishedProduct::count();
        $unfinishedProducts =Product::where('status', 0)->count();
        $vendors= Vendor::count();
        $posOrders = PosOrder::count();
        $customers = Customer::count();
        $orders=Order::count();
        return view('admin.dashboard', compact('finishedProducts', 'unfinishedProducts', 'vendors', 'posOrders', 'customers', 'orders'));
    }
}
