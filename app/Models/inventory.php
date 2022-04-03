<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $table = "inventory";
    protected $primaryKey = "id";
    protected $fillable = [
       'id','Nama_barang','Nama_user','Diambil','kategori','harga_total','Lokasi_penyimpanan','alamat','ppn'];

}