@extends('home')

@section('StokPurch')
    <table class="table table-bordered shadow-lg">
        <tr class="text-center" style="font-size: 13px">
            <th>No</th>
            <th>Nama Barang</th>
            <th>diambil</th>
            <th>Harga Total</th>
            <th>Kategori</th>
            <th>Alamat</th>
            <th>Bahan Total</th>
        </tr>
        @foreach ($ListPembelian as $item)
            <tr class="text-center" style="font-size:13px; font-weight:600">
                <th>{{ $loop->iteration }}</th>
                <th>{{ $item->Nama_barang }}</th>
                <th>{{ $item->Diambil }}</th>
                <th>{{ number_format($item->harga_total) }}</th>
                <th>{{ $item->kategori }}</th>
                <th>{{ $item->alamat }}</th>
                <th></th>
            </tr>
        @endforeach
    </table>
@endsection
