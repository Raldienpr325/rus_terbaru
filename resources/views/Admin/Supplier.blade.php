@extends('home')

@section('list-supplier')
    <table class="table table-bordered shadow-lg">
        <tr class="text-center" style="font-size: 13px">
            <th>No</th>
            <th>Kategori Supplier</th>
            <th>Stok besi</th>
            <th>Stok kabel</th>
            <th>Stok lem</th>

        </tr>
        @foreach ($supplier as $item)
            <tr class="text-center" style="font-size:13px; font-weight:600">
                <th>{{ $loop->iteration }}</th>
                <th>{{ $item->kategori_supplier }}</th>
                <th>{{ $item->stok_besi }}</th>
                <th>{{ $item->stok_kabel }}</th>
                <th>{{ $item->stok_lem }}</th>
            </tr>
        @endforeach
    </table>
@endsection
