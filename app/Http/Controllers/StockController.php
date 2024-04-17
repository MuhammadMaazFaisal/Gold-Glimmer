<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\Stock;
use App\Models\StockDetail;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('stockDetails')->get();
        return view('admin.stock.index', compact('stocks'));
    }

    public function store(Request $request)
    {

        $stock = Stock::where('p_id', 'existing')->first();
        if (!$stock) {
            $stock = new Stock();
            $stock->id = 'existing'; 
            $stock->p_id = 'existing';
        }
        $stock->total = 0;
        $stock->save();

        $stockDetails = StockDetail::where('s_id', $stock->id)->get();
        for ($i = 0; $i < count($request->total); $i++) {
            $stockDetails = StockDetail::where('s_id', $stock->id)->where('barcode', $request->barcode[$i])->first();
            if ($stockDetails) {
                $stockDetails->quantity = $stockDetails->quantity + $request->quantity[$i];
                $stockDetails->weight = $stockDetails->weight + $request->weight[$i];
            } else {
                $stockDetails = new StockDetail();
                $stockDetails->quantity = $request->quantity[$i];
                $stockDetails->weight = $request->weight[$i];
            }
            if (InventoryItem::where('name', $request->detail[$i])->first()) {
                $stockDetails->item_id = InventoryItem::where('name', $request->detail[$i])->first()->id;
            } else {
                $inventoryItem = new InventoryItem();
                $inventoryItem->name = $request->detail[$i];
                $inventoryItem->save();
                $stockDetails->item_id = $inventoryItem->id;
            }
            $stockDetails->rate = $request->rate[$i];
            $stockDetails->total_amount = $request->total[$i];
            $stockDetails->barcode = $request->barcode[$i];
            $stockDetails->s_id = $stock->id;
            $stockDetails->detail = $request->detail[$i];
            $stockDetails->price_per = $request->price_per[$i];
            $stockDetails->save();
        }

        $notification = array(
            'message' => 'Stock added successfully',
            'alert-type' => 'success'
        );
        return response()->json($notification);
    }

    public function create()
    {
        return view('admin.stock.create');
    }

    public function destroy($id)
    {
        StockDetail::where('id', $id)->delete();
        $notification = array(
            'message' => 'Stock deleted successfully',
            'alert-type' => 'success'
        );
        return response()->json($notification);
    }
}
