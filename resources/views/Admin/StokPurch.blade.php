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
                    <tr class="text-center" style="font-size:13px; font-weight:600">
                        <form action="{{ url('done', $item->id) }}" method="post">
                            @csrf
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->Nama_pembeli }}</th>
                            <th>{{ $item->Nama_barang }}</th>
                            <th>{{ $item->Diambil }}</th>
                            <th>{{ number_format($item->harga_total) }}</th>
                            <th>{{ $item->kategori }}</th>
                            <th>{{ $item->alamat }}</th>
                            <th> <button class="btn btn-sm"
                                    style="background-color: rgba(165, 42, 42, 0.308);color:black;font-size:12px;font-weight:500">Pending</button>
                            </th>
                            <th>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option selected disabled value="">Pilih Supplier</option>
                                            @foreach ($listSupplier as $item)
                                                <option value="kategori_supplier">{{ $item->kategori_supplier }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Field is required !
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-sm ">Proses Pemesanan</button>
                                </div>
                        </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
