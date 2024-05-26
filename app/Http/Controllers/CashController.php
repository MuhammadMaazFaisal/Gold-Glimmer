<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index(Request $request)
    {
        $vendor_id = $request->vendor_id;
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
        $records = Cash::where('type', $type)->with('vendor')->get();
        return view('admin.cash.index', compact('type', 'records'));
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
        $customer = Customer::find($request->vendor);
        if ($customer) {
            $cash->user_type = 'customer';
            $cash->user_id = $customer->id;
        } else {
            $cash->user_type = 'vendor';
            $cash->user_id = $request->vendor;
        }
        $cash->type = $request->type;
        $cash->details = $request->details;
        $cash->amount = $request->amount;
        $cash->date = $request->date;
        $cash->save();

        if ($customer) {
            if ($request->type == 'Issue') {
                $customer->balance = $customer->balance + $request->amount;
            } else {
                $customer->balance = $customer->balance - $request->amount;
            }
            $customer->save();
        }

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
        $customers = Customer::all();
        //combine the two collections
        $vendors = $vendors->merge($customers);
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
