<?php

namespace App\Http\Controllers;

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
