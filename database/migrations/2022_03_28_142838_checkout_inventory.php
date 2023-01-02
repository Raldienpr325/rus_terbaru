<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CheckoutInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkoutInventory', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_barang');
            $table->string('Nama_pembeli');
            $table->integer('Diambil');
            $table->integer('harga_total');
            $table->string('kategori');
            $table->string('alamat');
            $table->string('status')->nullable();
            $table->integer('Bahan_total')->nullable();
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