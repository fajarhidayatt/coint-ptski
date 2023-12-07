<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hbeli extends Model
{
    use HasFactory;

    protected $table = 'tbl_hbeli';
    protected $fillable = [
        'no_transaksi',
        'kode_spl',
        'tgl_beli',
    ];
}
