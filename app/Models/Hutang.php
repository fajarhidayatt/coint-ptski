<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $table = 'tbl_hutang';
    protected $fillable = [
        'no_transaksi',
        'kode_spl',
        'tgl_beli',
        'total_hutang',
    ];
}
