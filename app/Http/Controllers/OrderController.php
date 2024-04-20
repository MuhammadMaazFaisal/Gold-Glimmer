<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $manufacturers = Vendor::where('type',  VendorType::where('name', 'Manufacturing')->first()->id)->get();
        $customers = Customer::all();
        return view('admin.order.index', compact('manufacturers', 'customers'));
    }
}
