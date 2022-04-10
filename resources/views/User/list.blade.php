@extends('home')
@section('content')
    <div class="wrapper" style="padding: 20px">
        <h2 class="text-center">List Inventory</h2>
        <p class="text-center" style="font-size: 18px; color:blue;">Berikut Merupakan Inventory Anda</p>
        <div class="row">
            @foreach ($databarang as $item)
                <div class="col-lg-4 col-6 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="padding: 10px">
                        <div class="card-body">
                            <h2 class="card-title" style="font-weight: 400">Nama Barang : {{ $item->Nama_barang }}</h2>
                            <p class="card-text">Stok Tersedia : {{ $item->jumlah }}</p>
                            <a href="{{ url('checkout', $item->id) }}" class="btn btn-primary">Pick Item</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
