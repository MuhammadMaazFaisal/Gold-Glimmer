<?php

namespace App\Http\Controllers;

use App\Models\Metal;
use App\Models\MetalType;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class MetalController extends Controller
{

    public function index(Request $request)
    {
        $vendor_id= $request->vendor_id;
        if ($vendor_id) {
            $metals = $metals = Metal::where('type', MetalType::where('name', $request->type)->first()->id)->where('vendor_id', $vendor_id)->with('vendor')->get();
        } else {
            $metals = Metal::where('type', MetalType::where('name', $request->type)->first()->id)->with('vendor')->get();
        }
        $total_weight = Vendor::where('id', $vendor_id)->first()->balance;
        return response()->json(['data' => $metals, 'total_weight' => $total_weight]);
    }

    public function create()
    {
        $currentRoute = request()->route()->getName();
        if ($currentRoute == 'issue.metal') {
            $type = 'Issue';
        } else {
            $type = 'Receive';
        }
        return view('admin.metal.index', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor' => 'required',
            'type' => 'required',
            'issued_weight' => 'required',
            'purity' => 'required',
            'pure_weight' => 'required',
            'date' => 'required',
        ]);

        $metal = new Metal();
        $metal->vendor_id = $request->vendor;
        $metal->type = MetalType::where('name', $request->type)->first()->id;
        $metal->details = $request->details;
        $metal->issued_weight = $request->issued_weight;
        $metal->purity = $request->purity;
        $metal->pure_weight = $request->pure_weight;
        $metal->date = $request->date;
        $metal->save();

        $vendor = Vendor::where('id', $request->vendor)->first();
        if ($request->type == 'Issue') {
            $vendor->balance = $vendor->balance + $request->pure_weight;
        } else {
            $vendor->balance = $vendor->balance - $request->pure_weight;
        }
        
        $notification = array(
            'message' => 'Metal Record created successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor' => 'required',
            'type' => 'required',
            'issued_weight' => 'required',
            'purity' => 'required',
            'pure_weight' => 'required',
            'date' => 'required',
        ]);

        $metal = Metal::find($id);
        $metal->vendor_id = $request->vendor;
        $metal->details = $request->details;
        $metal->issued_weight = $request->issued_weight;
        $metal->purity = $request->purity;
        $metal->pure_weight = $request->pure_weight;
        $metal->date = $request->date;
        $metal->save();

        $notification = array(
            'message' => 'Metal Record updated successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    } 
    
    public function getMetalVendors(Request $request)
    {
        $vendors = Vendor::wherein('type', [VendorType::where('name', 'Manufacturing')->first()->id, VendorType::where('name', 'Polishing')->first()->id, VendorType::where('name', 'Stone Setting')->first()->id])->get();
        return response()->json(['data' => $vendors]);
    }

    public function destroy($id)
    {
        $metal = Metal::find($id);
        $metal->delete();
        $notification = array(
            'message' => 'Metal Record deleted successfully!',
            'alert-type' => 'success'
        );
        return response()->json(['data' => $notification]);
    }
}
