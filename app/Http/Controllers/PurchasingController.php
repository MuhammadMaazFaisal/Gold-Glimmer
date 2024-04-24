<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use App\Models\Stock;
use App\Models\StockDetail;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    public function index()
    {
        $purchasings = Purchasing::with('vendor')->get();
        return response()->json($purchasings);
    }

    public function create()
    {
        return view('admin.purchasing.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'invoice' => 'required',
            'total' => 'required',
        ]);

        $purchasing = new Purchasing();
        $purchasing->id = $request->invoice;
        $purchasing->vendor_id = $request->vendor_id;
        $purchasing->total = $request->grand_total;
        $purchasing->save();

        for ($i = 0; $i < count($request->total); $i++) {
            $inventory_item = InventoryItem::where('name', $request->detail[$i])->first();
            if (!$inventory_item) {
                $inventory_item = new InventoryItem();
                $inventory_item->name = $request->detail[$i];
                $inventory_item->save();
            }
            $purchasingDetails = new PurchasingDetail();
            $purchasingDetails->p_id = $purchasing->id;
            $purchasingDetails->item_id = $inventory_item->id;
            $purchasingDetails->detail = $request->detail[$i];
            $purchasingDetails->quantity = $request->quantity[$i];
            $purchasingDetails->remaining_quantity = $request->quantity[$i];
            $purchasingDetails->price_per = $request->price_per[$i];
            $purchasingDetails->weight = $request->weight[$i];
            $purchasingDetails->remaining_weight = $request->weight[$i];
            $purchasingDetails->rate = $request->rate[$i];
            $purchasingDetails->total_amount = $request->total[$i];
            $purchasingDetails->remaining_total_amount = $request->total[$i];
            $purchasingDetails->barcode = $request->barcode[$i];
            $purchasingDetails->save();
        }

        $lastStock = Stock::latest()->first();
        $nextStockNumber = $lastStock ? str_pad($lastStock->id + 1, 4, '0', STR_PAD_LEFT) : '0001';

        $stock = new Stock();
        $stock->id = $nextStockNumber;
        $stock->p_id = $purchasing->id;
        $stock->total = $request->grand_total;
        $stock->save();

        for ($i = 0; $i < count($request->total); $i++) {
            $stockDetails = new StockDetail();
            $stockDetails->s_id = $stock->id;
            $stockDetails->item_id = InventoryItem::where('name', $request->detail[$i])->first()->id;
            $stockDetails->detail = $request->detail[$i];
            $stockDetails->price_per = $request->price_per[$i];
            $stockDetails->quantity = $request->quantity[$i];
            $stockDetails->weight = $request->weight[$i];
            $stockDetails->rate = $request->rate[$i];
            $stockDetails->total_amount = $request->total[$i];
            $stockDetails->barcode = $request->barcode[$i];
            $stockDetails->save();
        }



        $notification = array(
            'message' => 'Purchasing created successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor_id' => 'required',
            'invoice' => 'required',
            'total' => 'required',
        ]);
        $purchasing = Purchasing::find($id);
        $purchasing->vendor_id = $request->vendor_id;
        $purchasing->total = $request->grand_total;
        $purchasing->save();

        for ($i = 0; $i < count($request->total); $i++) {
            $inventory_item = InventoryItem::where('name', $request->detail[$i])->first();
            if (!$inventory_item) {
                $inventory_item = new InventoryItem();
                $inventory_item->name = $request->detail[$i];
                $inventory_item->save();
            }
            $purchasingDetails = PurchasingDetail::where('p_id', $id)->where('barcode', $request->barcode[$i])->first();
            if (!$purchasingDetails) {
                $purchasingDetails = new PurchasingDetail();
            }
            $purchasingDetails->p_id = $purchasing->id;
            $purchasingDetails->item_id = $inventory_item->id;
            $purchasingDetails->detail = $request->detail[$i];
            $purchasingDetails->quantity = $request->quantity[$i];
            $purchasingDetails->remaining_quantity = $request->quantity[$i];    
            $purchasingDetails->price_per = $request->price_per[$i];
            $purchasingDetails->weight = $request->weight[$i];
            $purchasingDetails->remaining_weight = $request->weight[$i];
            $purchasingDetails->rate = $request->rate[$i];
            $purchasingDetails->total_amount = $request->total[$i];
            $purchasingDetails->remaining_total_amount = $request->total[$i];
            $purchasingDetails->barcode = $request->barcode[$i];
            $purchasingDetails->save();
        }

        $stock = Stock::where('p_id', $id)->first();
        $stock->total = $request->grand_total;
        $stock->save();
        $stockDetails = StockDetail::where('s_id', $stock->id)->get();
        for ($i = 0; $i < count($request->total); $i++) {
            if ($request->checkbox_values[$i] == 1) {
                $stockDetails = StockDetail::where('s_id', $stock->id)->where('barcode', $request->barcode[$i])->first();
                if ($stockDetails) {
                    $stockDetails->quantity = $stockDetails->quantity + $request->quantity[$i];
                    $stockDetails->weight = $stockDetails->weight + $request->weight[$i];
                } else {
                    $stockDetails = new StockDetail();
                    $stockDetails->quantity = $request->quantity[$i];
                    $stockDetails->weight = $request->weight[$i];
                }
                $stockDetails->item_id = InventoryItem::where('name', $request->detail[$i])->first()->id;
                $stockDetails->rate = $request->rate[$i];
                $stockDetails->total_amount = $request->total[$i];
                $stockDetails->barcode = $request->barcode[$i];
                $stockDetails->s_id = $stock->id;
                $stockDetails->detail = $request->detail[$i];
                $stockDetails->price_per = $request->price_per[$i];
                $stockDetails->save();
            }
        }

        $notification = array(
            'message' => 'Purchasing updated successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    public function edit($id)
    {
        $purchasing = PurchasingDetail::where('p_id', $id)->get();
        return response()->json($purchasing);
    }

    public function getPurchasingVendors()
    {
        $vendors = Vendor::where('type', VendorType::where('name', 'Additional Vendor')->first()->id)->where('name', '!=', 'existing')
            ->get();
        return response()->json($vendors);
    }

    public function getNextPurchasingNumber()
    {
        $count = Purchasing::count();
        $nextPurchasingNumber = $count ? str_pad($count + 1, 4, '0', STR_PAD_LEFT) : '0001';
        return response()->json($nextPurchasingNumber);
    }

    public function destroy($id)
    {
        // first stock details then stock then purchasing details then purchasing
        $stock = Stock::where('p_id', $id)->first();
        $stockDetails = StockDetail::where('s_id', $stock->id)->get();
        foreach ($stockDetails as $stockDetail) {
            $stockDetail->delete();
        }
        $stock->delete();

        $purchasingDetails = PurchasingDetail::where('p_id', $id)->get();
        foreach ($purchasingDetails as $purchasingDetail) {
            $purchasingDetail->delete();
        }

        $purchasing = Purchasing::find($id);
        $purchasing->delete();

        $notification = array(
            'message' => 'Purchasing deleted successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }
}
