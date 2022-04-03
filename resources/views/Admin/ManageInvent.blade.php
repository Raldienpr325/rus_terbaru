@extends('home')

@section('ManageInvent')
    <div class="content">
        <div class="card-body">
            <a href="{{ url('TambahInvent') }}" class="btn btn-sm btn-success"
                style="margin-bottom:20px;float:right;font-size:11px">Add
                Data</a>
            <table class="table table-bordered shadow-lg">
                <tr class="text-center" style="font-size: 13px">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Kategori</th>
                    <th>Lokasi Penyimpanan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($dataInvent as $item)
                    <tr class="text-center" style="font-size:13px; font-weight:600">
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" width="65" height="65"></td>
                        <td>{{ $item->Nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->harga_satuan) }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->Lokasi_penyimpanan }}</td>
                        <td>
                            <button class="btn btn-sm"
                                style="background-color: rgba(165, 42, 42, 0.308);color:black;font-size:12px;font-weight:500">Created
                                At :
                                {{ $item->created_at }}</button>
                            <button class="btn btn-sm"
                                style="background-color: wheat;color:black;font-size:12px;font-weight:500">Updated At :
                                {{ $item->updated_at }}</button>
                        </td>
                        <td>
                            <a href="{{ url('delete', $item->id) }}" class="btn btn-sm"
                                style="background-color: red; color:white;font-weight:6 00;font-size:10px">DELETE</a>
                            <a href="{{ url('edit', $item->id) }}" class="btn btn-sm"
                                style="background-color: green;color:white;font-weight:400;font-size:10px">UPDATE</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
    </div>
@endsection
