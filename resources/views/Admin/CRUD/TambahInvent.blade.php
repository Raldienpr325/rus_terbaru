@extends('home')

@section('content')
    <div class="content">
        <div class="card-body">
            <form action="{{ url('simpanInvent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                        placeholder="gambar" required autofocus value="{{ old('gambar') }}">
                </div>

                <div class="form-group">
                    <input type="text" id="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                        placeholder="jumlah" required autofocus value="{{ old('jumlah') }}">
                </div>
                <div class="form-group">
                    <input type="text" id="harga_satuan" name="harga_satuan"
                        class="form-control @error('harga_satuan') is-invalid @enderror" placeholder="harga_satuan" required
                        autofocus value="{{ old('harga_satuan') }}">
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Nama_barang</label>
                        <select class="form-select" id="Nama_barang" name="Nama_barang" required>
                            <option selected disabled value="">Nama barang</option>
                            <option value="mesin_jahit">mesin_jahit</option>
                            <option value="mesin_pancing">mesin_kayu</option>
                            <option value="mesin_kayu">mesin_pancing</option>
                        </select>
                        <div class="invalid-feedback">
                            Field is required !
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option selected disabled value="">Pilih Kategori</option>
                            <option value="barang_berat">Barang berat</option>
                            <option value="barang_ringan">Barang ringan</option>
                        </select>
                        <div class="invalid-feedback">
                            Field is required !
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Lokasi_penyimpanan</label>
                        <select class="form-select" id="Lokasi_penyimpanan" name="Lokasi_penyimpanan" required>
                            <option selected disabled value="">Pilih Kategori</option>
                            <option value="gudang_1">gudang_1</option>
                            <option value="gudang_2">gudang_2</option>
                        </select>
                        <div class="invalid-feedback">
                            Field is required !
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-group-sm">input data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
