<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
           $table->id();
           $table->string('Nama_barang');
           $table->integer('jumlah');
           $table->integer('harga_satuan');
           $table->enum('kategori',['barang_berat','barang_ringan'])->default('barang_berat');
           $table->string('gambar');
           $table->enum('Lokasi_penyimpanan',['gudang_1','gudang_2'])->default('gudang_1');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}