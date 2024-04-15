<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('admin.stock.index');
    }

    public function create()
    {
        return view('admin.stock.create');
    }

}
