@extends('home')


@section('cetakresi')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <div class="content">
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Berhasil Checkout !
            </div>
            <a href="{{ url('#') }}">
                <p><button class="btn btn-sm btn-success"><i class="fas fa-shopping-cart" aria-hidden="true"></i> Lihat
                        Tas</button></p>

            </a>
            <p> Detail Barang</p>
            <table class="table table-bordered">
                <tr>
                    <th>Nama User</th>
                    <th>Nama Barang</th>
                    <th>Diambil</th>
                    <th>Kategori</th>
                    <th>Lokasi penyimpanan</th>
                    <th>alamat</th>
                </tr>
                <tr>
                    <td>{{ $datainventory['Nama_user'] }}</td>
                    <td>
                        {{ $datainventory['Nama_barang'] }} </td>
                    <td>{{ $datainventory['Diambil'] }}</td>
                    <td>{{ $datainventory['kategori'] }}</td>
                    <td>{{ $datainventory['Lokasi_penyimpanan'] }}</td>
                    <td>{{ $datainventory['alamat'] }}</td>
                </tr>
            </table>
            <table class="table table-bordered">
                &nbsp;

                <tr>
                    <th>Jumlah barang</th>
                    <td> {{ $datainventory['Diambil'] }} Buah</td>
                </tr>

                <tr>
                    <th>PPN</th>
                    <td> Rp {{ number_format($datainventory['ppn']) }}</td>
                </tr>
                <tr>
                    <th>Biaya Total</th>
                    <td> Rp {{ number_format($datainventory['harga_total']) }}</td>
                </tr>
            </table>
            <div class="dropdown" style="margin-top:5px">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Pembayaran
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">OVO</a></li>
                    <li><a class="dropdown-item" href="#">Shopee Pay</a></li>
                </ul>
            </div>
            <a href="#"> <button class="btn btn-sm btn-danger" style="margin-top:-70px;margin-left:745px;font-weight:500"
                    type="button">Buat
                    Pesanan</button></a>

            <br>
            <br>
        </div>
        {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
    </div>
@endsection
