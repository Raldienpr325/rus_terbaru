@extends('home')
@section('Edit')
    <div class="content">
        <div class="card" style="top: 30px">
            <div class="card-body">
                <form action="{{ url('update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <input type="file" id="gambar" name="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" placeholder="gambar" required
                            autofocus value="{{ $barang->gambar }}">
                    </div> --}}
                    <div class="form-group">
                        <input type="text" id="Nama_barang" name="Nama_barang"
                            class="form-control @error('Nama_barang') is-invalid @enderror" placeholder="Nama_barang"
                            required autofocus value="{{ $barang->Nama_barang }}">
                    </div>
                    <div class="form-group">
                        <input type="text" id="jumlah" name="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror" placeholder="jumlah" required
                            autofocus value="{{ $barang->jumlah }}">
                    </div>
                    <div class="form-group">
                        <input type="text" id="harga_satuan" name="harga_satuan"
                            class="form-control @error('harga_satuan') is-invalid @enderror" placeholder="harga_satuan"
                            required autofocus value="{{ $barang->harga_satuan }}">
                    </div>
                    <div class="form-group">
                        <input type="text" id="kategori" name="kategori"
                            class="form-control @error('kategori') is-invalid @enderror" placeholder="kategori" required
                            autofocus value="{{ $barang->kategori }}">
                    </div>
                    <div class="form-group">
                        <input type="text" id="Lokasi_penyimpanan" name="Lokasi_penyimpanan"
                            class="form-control @error('Lokasi_penyimpanan') is-invalid @enderror"
                            placeholder="Lokasi Penyimpanan" required autofocus value="{{ $barang->Lokasi_penyimpanan }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-group-sm">input data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
