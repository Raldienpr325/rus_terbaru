@extends('home')

@section('content')
    <div class="content">
        <div class="card-body">
            <table class="table table-bordered shadow-lg">
                <tr class="text-center" style="font-size: 13px">
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>diambil</th>
                    <th>Harga Total</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Pilih Supplier</th>
                </tr>
                @foreach ($ListPembelian as $item)
                    <form action="{{ url('done', $item->id) }}" method="post">
                        @csrf
                        <tr class="text-center" style="font-size:13px; font-weight:600">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->Nama_pembeli }}</th>
                            <th><input type="text" id="Nama_barang" name="Nama_barang" class="form-control"
                                    placeholder=" Alamat Anda" required value="{{ $item->Nama_barang }}" readonly></th>
                            <th><input type="text" id="Diambil" name="Diambil" class="form-control" required
                                    value="{{ $item->Diambil }}" readonly></th>
                            <th>Rp {{ number_format($item->harga_total) }}</th>
                            <th>{{ $item->kategori }}</th>
                            <th>{{ $item->alamat }}</th>
                            <th>
                                @if (!$item->status)
                                    <a href="#" class="btn btn-sm"
                                        style="background-color: rgba(165, 42, 42, 0.308);color:black;font-size:12px;font-weight:500">Pending</a>
                                @else()
                                    <a href="#" class="btn btn-sm"
                                        style="background-color: rgba(33, 207, 6, 0.308);color:black;font-size:12px;font-weight:500">Delivered</a>
                                @endif
                            </th>
                            <th>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select class="form-select" id="supplier" name="supplier" required
                                            style="margin-top: 10px">
                                            <option selected value="">Pilih Supplier</option>
                                            @foreach ($listSupplier as $item)
                                                <option value="{{ $item->kategori_supplier }}">
                                                    {{ $item->kategori_supplier }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Field is required !
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm " style="font-size: 12px">Proses
                                    Pemesanan</button>

                    </form>
                @endforeach
                </th>
                </tr>
            </table>
        </div>
    </div>
@endsection
