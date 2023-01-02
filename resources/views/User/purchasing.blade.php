@extends('home')

@section('content')
    <h2 class="text-center mt-3 mb-3"> Daftar purchasing anda</h2>
    <table class="table table-hover table-bordered border-dark table-secondary">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Diambil</th>
                <th>Total Cost</th>
                <th>Kategori</th>
                <th>Alamat</th>
                <th>status pengiriman</th>
            </tr>
        </thead>
        @foreach ($keranjang as $item)
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->Nama_barang }}</td>
                    <td>{{ $item->Diambil }}</td>
                    <td>Rp.{{ number_format($item->harga_total) }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        @if (!$item->status)
                            <p>pending</p>
                        @else()
                            {{ $item->status }}
                        @endif
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
