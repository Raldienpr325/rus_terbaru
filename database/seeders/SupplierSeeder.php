<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        
      Supplier::create([
        'kategori_supplier' => 'supplier_3',
        'stok_besi' => 100,
        'stok_kabel' => 100,
        'stok_lem' => 100,   
      ]);
      Supplier::create([
        'kategori_supplier' => 'supplier_2',
        'stok_besi' => 100,
        'stok_kabel' => 100,
        'stok_lem' => 100,   
      ]);
      Supplier::create([
        'kategori_supplier' => 'supplier_1',
        'stok_besi' => 1000,
        'stok_kabel' => 100,
        'stok_lem' => 100,   
      ]);

    }
}