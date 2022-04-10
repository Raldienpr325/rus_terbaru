<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'Supplier';
    protected $fillable = [
        'kategori_supplier', 'stok_mesin_pancing', 'stok_mesin_kayu' ,'stok_mesin_jahit'];
}