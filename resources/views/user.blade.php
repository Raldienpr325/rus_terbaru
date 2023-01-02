@extends('home')

@section('content')
    <style>
        .aligncenter {
            text-align: center;
            margin-top: -80px;
        }

    </style>
    <div class="wrapper">
        <h4 class="text-center" style="line-height:200px">Hi Selamat datang di Website Inventory Online</h4>
        <a href="{{ url('list-inventory') }}" style="text-decoration: none"> </a>
        <p class="aligncenter"> <img src=" {{ asset('img/logo-minierp2.png') }}" alt="centered image" width="100"
                height="100">
        <p class="text-center" style="font-weight: 500;margin-top:-10px">PT. Bimbim Malang</p>
        <p class="text-center" style="margin-top: -15px">Universitas Brawijaya Malang</p>
        </p>
    </div>
@endsection
