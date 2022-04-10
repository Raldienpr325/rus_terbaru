<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutInventory extends Model
{
    use HasFactory;
    protected $table = 'checkoutInventory';

    protected $fillable = [
       'Nama_pembeli', 'Nama_barang' , 'Diambil' , 'harga_total' , 'kategori' ,'alamat', 
    ];
}