<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index(Request $request)
    {
        $vendor_id= $request->vendor_id;
        if ($vendor_id) {
            $cashs = $cashs = Cash::where('type', $request->type)->where('vendor_id', $vendor_id)->with('vendor')->get();
        } else {
            $cashs = Cash::where('type', $request->type)->with('vendor')->get();
        }
        $total_weight = $cashs->sum('pure_weight');
        return response()->json(['data' => $cashs, 'total_weight' => $total_weight]);
    }

    public function create()
    {
        $currentRoute = request()->route()->getName();
        if ($currentRoute == 'issue.cash') {
            $type = 'Issue';
        } else {
            $type = 'Receive';
        }
        return view('admin.cash.index', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        $cash = new Cash();
        $cash->vendor_id = $request->vendor;
        $cash->type = $request->type;
        $cash->details = $request->details;
        $cash->amount = $request->amount;
        $cash->date = $request->date;
        $cash->save();

        $notification = array(
            'message' => 'Cash Record created successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        $cash = Cash::find($id);
        $cash->vendor_id = $request->vendor;
        $cash->type = $request->type;
        $cash->details = $request->details;
        $cash->amount = $request->amount;
        $cash->date = $request->date;
        $cash->save();

        $notification = array(
            'message' => 'Cash Record updated successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    } 
    
    public function getCashVendors(Request $request)
    {
        $vendors = Vendor::wherein('type', [VendorType::where('name', 'Additional Vendor')->first()->id])->where('name', '!=', 'existing')->get();
        return response()->json(['data' => $vendors]);
    }

    public function destroy($id)
    {
        $cash = Cash::find($id);
        $cash->delete();
        $notification = array(
            'message' => 'Cash Record deleted successfully!',
            'alert-type' => 'success'
        );
        return response()->json(['data' => $notification]);
    }
}
