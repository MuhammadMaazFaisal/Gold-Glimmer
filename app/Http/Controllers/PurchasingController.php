<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    public function index()
    {
        return view('admin.purchasing.index');
    }

    public function create()
    {
        return view('admin.purchasing.index');
    }
}
