<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_dbeli', function (Blueprint $table) {
            $table->id();

            $table->string('no_transaksi', 10)->unique();
            $table->string('kode_brg', 10);
            $table->integer('harga_beli');
            $table->integer('qty');
            $table->integer('diskon');
            $table->integer('diskon_rp');
            $table->integer('total_rp');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dbeli');
    }
};
