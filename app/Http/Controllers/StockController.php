<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        /// ambil semua data stock
        $stock = Stock::all();

        return view('dashboard.stock.index', [
            'stock' => $stock
        ]);
    }
}
