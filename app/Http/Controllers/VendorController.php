<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function index()
    {
        $vendors = Vendor::all();
        return $vendors;
    }

    public function create()
    {
        $currentRoute = request()->route()->getName();
        if ($currentRoute == 'manufacturer') {
            $type = 'Manufacturing';
        } elseif ($currentRoute == 'polisher') {
            $type = 'Polishing';
        } elseif ($currentRoute == 'stone-setter') {
            $type = 'Stone Setting';
        } else {
            $type = 'Additional Vendors';
        }
        return view('admin.vendor.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->type = VendorType::where('name', $request->type)->first()->id;
        $vendor->status = 1;
        $vendor->save();

        $notification = array(
            'message' => 'Vendor created successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['notification' => $notification]);
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function getNextVendorNumber()
    {
        $vendor = Vendor::orderBy('id', 'desc')->first();
        if ($vendor) {
            // number format should be 0001
            $vendorNumber = str_pad($vendor->id + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $vendorNumber = '0001';
        }
        return response()->json(['vendorNumber' => $vendorNumber]);
    }
}
