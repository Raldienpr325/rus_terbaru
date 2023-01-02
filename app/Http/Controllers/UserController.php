<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CheckoutInventory;

class UserController extends Controller
{
    public function index()
    {
        $dtKategori = barang::pluck('kategori');
        dump($dtKategori);
        $databarang = barang::all();
        return view('User.list', compact(
            ['databarang', 'dtKategori']
        ));
    }

    public function listpurchasing()
    {
        $datapurchasing = barang::all();
        return view('User.purchasing');
    }

    public function checkout($id)
    {
        $databarang = barang::findorfail($id);
        return view('User.checkout', compact('databarang'));
    }

    public function cetakresi(Request $request, $id)
    {

        $databarang = barang::findorfail($id);
        $datanama = Auth::user()->name;
        $diambil = $request['jumlah'];
        $ppn = 0.15 * $databarang['harga_satuan'];
        $updatedstok = $databarang['jumlah'] - $request['jumlah'];
        $totalharga = $request['jumlah'] * $databarang->harga_satuan + $ppn;
        $alamat = $request['alamat'];

        $datainventory = [
            'Nama_user' => $datanama,
            'Nama_barang' => $databarang->Nama_barang,
            'Diambil' => $diambil,
            'harga_total' => $totalharga,
            'kategori' => $databarang->kategori,
            'ppn' => $ppn,
            'Lokasi_penyimpanan' => $databarang->Lokasi_penyimpanan,
            'alamat' => $alamat,
        ];
        $datacheckout = [
            'Nama_pembeli' => $datanama,
            'Nama_barang' => $databarang->Nama_barang,
            'Diambil' => $diambil,
            'harga_total' => $totalharga,
            'kategori' => $databarang->kategori,
            'alamat' => $alamat,
        ];
        if ($updatedstok < 0) {
            return redirect()->back();
        } else {
            inventory::create($datainventory);
            CheckoutInventory::create($datacheckout);
            DB::table('barang')->where('id', $id)->update([
                'jumlah' => $updatedstok,
            ]);

            return view('User.cetakresi', compact('datainventory'));
        }
    }
    public function inventory()
    {
        $keranjang = CheckoutInventory::where('nama_pembeli', Auth::user()->name)->get();
        $namauser = Auth::user()->name;
        if (Auth::user()->name == $keranjang) {
            return redirect()->back();
        } else {
            return view('user.purchasing', compact('keranjang'));
        }
    }
}