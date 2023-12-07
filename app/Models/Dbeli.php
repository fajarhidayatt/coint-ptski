<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbeli extends Model
{
    use HasFactory;

    protected $table = 'tbl_dbeli';
    protected $fillable = [
        'no_transaksi',
        'kode_brg',
        'harga_beli',
        'qty',
        'diskon',
        'diskon_rp',
        'total_rp',
    ];
}
