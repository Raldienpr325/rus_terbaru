<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\CheckoutInventory;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    public function mnginventory(){
        $dataInvent = barang::all();
        return view('Admin.ManageInvent',compact('dataInvent'));
    }

    public function grafikinventory(){
        $dtDiagram = barang::get();
        $categories = []; //data dilempar di xAxis
        $data = []; //data dilempar di series
        foreach ($dtDiagram as $rek) {
            $categories[] = $rek->Nama_barang; //berisi data looping dari tabel checkout yang isinya nama barang
            $data[] = $rek->jumlah;
        }
        return view('admin.CRUD.chart', ['categories' => $categories, 'data' => $data]);
    }

    public function grafikpembelian(){
        $dtDiagram = CheckoutInventory::get();
        $categories = []; //data dilempar di xAxis
        $data = []; //data dilempar di series
        foreach ($dtDiagram as $rek) {
            $categories[] = $rek->Nama_barang; //berisi data looping dari tabel checkout yang isinya nama barang
            $data[] = $rek->Diambil;
        }
        return view('admin.CRUD.chart2', ['categories' => $categories, 'data' => $data]);
    }

    public function listpembelian(){
        $ListPembelian = CheckoutInventory::all();
        $listSupplier = Supplier::all();
        return view('Admin.StokPurch', compact('ListPembelian','listSupplier'));
    }

    public function listsupplier(){
        $supplier = Supplier::all();
        return view('Admin.Supplier', compact('supplier'));
    }

    public function tambahinvent(){
        return view('Admin.CRUD.TambahInvent');
    }

    public function done(Request $request, $id){
        $status = 'confirmed';
        $Diambil = $request['Diambil'];
        if($request['supplier'] == 'supplier_1'){
            $id_supplier = '1';
        }
        if($request['supplier'] == 'supplier_2'){
            $id_supplier = '2';
        }
        if($request['supplier'] == 'supplier_3'){
            $id_supplier = '3';
        }
        $supplier = Supplier::findorfail($id_supplier);
        if($request['Nama_barang'] == 'mesin_pancing'){
            $new_stok_pancing = $supplier['stok_mesin_pancing'] - $Diambil;
            if($new_stok_pancing < 0){
                return redirect()->back();
            }else{
                DB::table('Supplier')
                ->where('kategori_supplier', $request['supplier'])
                ->update(['stok_mesin_pancing' => $new_stok_pancing]);
            }
        }
        if($request['Nama_barang'] == 'mesin_kayu'){
            $new_stok_kayu = $supplier['stok_mesin_kayu'] - $Diambil;
            if($new_stok_kayu < 0){
                return redirect()->back();
            }else{
                DB::table('Supplier')
                ->where('kategori_supplier', $request['supplier'])
                ->update(['stok_mesin_kayu' => $new_stok_kayu]);
            }
        }
        if($request['Nama_barang'] == 'mesin_jahit'){
            $new_stok_jahit = $supplier['stok_mesin_jahit'] - $Diambil;
            if($new_stok_jahit < 0 ){
                return redirect()->back();
            }else{
                DB::table('Supplier')
                ->where('kategori_supplier', $request['supplier'])
                ->update(['stok_mesin_jahit' => $new_stok_jahit]);
            }
        }
        DB::table('checkoutInventory')
        ->where('id',$id)->update(['status'=> $status]);
        return view('Admin.done');
    }
 
  
    
    public function simpanInvent(Request $request){
        $validate = $request->validate([
            'gambar' => 'image|file|max:5000',
            'Nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|integer',
            'kategori' => 'required',
            'Lokasi_penyimpanan' => 'required',
        ]);
        if ($request->file('gambar')) {
            $validate['gambar'] = $request->file('gambar')->store('post-images');
        }
        barang::create($validate);
        return redirect('mng-inventory');
    }

    public function edit($id){
        $barang = barang::findorfail($id);
        return view('Admin.CRUD.EditInvent', compact('barang'));
    }

    public function update(Request $request,$id){
        $barang=barang::findorfail($id);
        $barang->update($request->all());
        return redirect('mng-inventory');
    }
    
    public function destroy($id)
    {
        $barang=barang::findorfail($id);
        $barang->delete();
        return redirect('mng-inventory');
    }
   
}