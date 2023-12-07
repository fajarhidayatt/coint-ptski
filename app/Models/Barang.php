<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';
    protected $fillable = [
        'kode_brg',
        'nama_brg',
        'satuan',
        'harga_beli'
    ];
}
