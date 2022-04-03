<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\CheckoutInventory;
use App\Models\Supplier;
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

    public function grafik2inventory(){
        $ListPembelian = CheckoutInventory::all();
        return view('Admin.StokPurch', compact('ListPembelian'));
    }

    public function listsupplier(){
        $supplier = Supplier::all();
        return view('Admin.Supplier', compact('supplier'));
    }

    public function tambahinvent(){
        
        return view('Admin.CRUD.TambahInvent');
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
            // dd('asd');
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