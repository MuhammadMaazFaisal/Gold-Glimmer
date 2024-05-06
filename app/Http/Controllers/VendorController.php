<?php

namespace App\Http\Controllers;

use App\Models\AdditionalStep;
use App\Models\Cash;
use App\Models\Metal;
use App\Models\PolisherStep;
use App\Models\Product;
use App\Models\ReturnedStoneStep;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        $vendors = Vendor::where('type', VendorType::where('name', $request->type)->first()->id)->where('name', '!=', 'existing')->get();
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
            $type = 'Additional Vendor';
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
        if ($request->type != 'Additional Vendor') {
            $vendor['18k'] = $request['18k'];
            $vendor['21k'] = $request['21k'];
            $vendor['22k'] = $request['22k'];
        }
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
        // calcualte balance of vendor
        if ($vendor->type == 1) {
            $balance = Product::where('vendor_id', $id)->sum('total');
            $given =Metal::where('vendor_id', $id)->where('type', 1)->sum('pure_weight');
            $received =Metal::where('vendor_id', $id)->where('type', 2)->sum('pure_weight');
            $amount= ($balance + $received) - $given;
        } elseif ($vendor->type == 2) {
            $balance = PolisherStep::where('vendor_id', $id)->sum('payable');
            $given =Metal::where('vendor_id', $id)->where('type', 1)->sum('pure_weight');
            $received =Metal::where('vendor_id', $id)->where('type', 2)->sum('pure_weight');
            $amount= ($balance + $received) - $given;
        } elseif ($vendor->type == 3) {
            $balance = ReturnedStoneStep::where('vendor_id', $id)->sum('payable');
            $given =Metal::where('vendor_id', $id)->where('type', 1)->sum('pure_weight');
            $received =Metal::where('vendor_id', $id)->where('type', 2)->sum('pure_weight');
            $amount= ($balance + $received) - $given;
        } else {
            $balance = AdditionalStep::where('vendor_id', $id)->sum('amount');
            $given =Cash::where('vendor_id', $id)->where('type', 'Issue')->sum('amount');
            $received =Cash::where('vendor_id', $id)->where('type', 'Receive')->sum('amount');
            $amount= ($balance + $received) - $given;
        }

        return response()->json(['vendor' => $vendor, 'balance' => $amount]);
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
        if ($request->type != 'Additional Vendor') {
            $vendor['18k'] = $request['18k'];
            $vendor['21k'] = $request['21k'];
            $vendor['22k'] = $request['22k'];
        }
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
