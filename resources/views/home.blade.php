@extends('layouts.app')

@section('content')
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Halaman Utama</h4>
            </div>
        </div>
        <div class="card-body">
            Hai {{ Auth::user()->name }}.. Selamat datang di aplikasi beasiswa!
        </div>
    </div>
</div>
@endsection