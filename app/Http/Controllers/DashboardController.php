<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Hbeli;
use App\Models\Stock;
use App\Models\Suplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $barang = Barang::all()->count();
        $suplier = Suplier::all()->count();
        $pembelian = Hbeli::all()->count();
        $stock = Stock::all()->sum('qty_beli');

        return view('dashboard.index', [
            'barang' => $barang,
            'suplier' => $suplier,
            'pembelian' => $pembelian,
            'stock' => $stock,
        ]);
    }
}
