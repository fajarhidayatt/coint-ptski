<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stock = Stock::all();

        return view('dashboard.stock.index', [
            'stock' => $stock
        ]);
    }
}
