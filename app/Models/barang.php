<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $fillable = [
       'id','Nama_barang','jumlah','harga_satuan','kategori','gambar','Lokasi_penyimpanan'];

       
}