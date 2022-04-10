@extends('home')

@section('content')
    <div class="content">
        <div class="card-body">
            <table class="table table-bordered shadow-lg">
                <tr class="text-center" style="font-size: 13px">
                    <th>No</th>
                    <th>Kategori Supplier</th>
                    <th>stok_mesin_pancing</th>
                    <th>stok_mesin_kayu</th>
                    <th>stok_mesin_jahit</th>

                </tr>
                @foreach ($supplier as $item)
                    <tr class="text-center" style="font-size:13px; font-weight:600">
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $item->kategori_supplier }}</th>
                        <th>{{ $item->stok_mesin_pancing }}</th>
                        <th>{{ $item->stok_mesin_kayu }}</th>
                        <th>{{ $item->stok_mesin_jahit }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
