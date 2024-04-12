<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        $vendors = Vendor::where('type', VendorType::where('name', $request->type)->first()->id)->get();
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
        return view('admin.vendor.index', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $vendor = new Vendor();
        $vendor->id = $request->id;
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->type = VendorType::where('name', $request->type)->first()->id;
        $vendor['18k'] = $request['18k'];
        $vendor['21k'] = $request['21k'];
        $vendor['22k'] = $request['22k'];
        $vendor->status = 1;
        $vendor->save();

        $notification = array(
            'message' => 'Vendor created successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return response()->json(['vendor' => $vendor]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $vendor = Vendor::find($id);
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor['18k'] = $request['18k'];
        $vendor['21k'] = $request['21k'];
        $vendor['22k'] = $request['22k'];
        $vendor->status = 1;
        $vendor->save();

        $notification = array(
            'message' => 'Vendor updated successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function getNextVendorNumber()
    {
        $vendor = Vendor::all()->count();
        if ($vendor) {
            $vendorNumber = str_pad($vendor + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $vendorNumber = '0001';
        }
        return response()->json(['vendorNumber' => $vendorNumber]);
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();

        $notification = array(
            'message' => 'Vendor deleted successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }
}
