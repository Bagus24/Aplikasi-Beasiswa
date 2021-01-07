@extends('mahasiswa.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Halaman Utama</h4>
            
        </div>
        <div class="card-body">
            Hai {{ auth()->guard('mahasiswa')->user()->nama }}.. Selamat datang di aplikasi beasiswa!
        </div>
    </div>
  </div>
@endsection
