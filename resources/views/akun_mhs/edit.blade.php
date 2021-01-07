@extends('layouts.app')

@section('content')
<div style="margin: 0 auto;" class="col-md-8">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Akun Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('akun_mhs.update', $mahasiswa->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <br>
                <div class="col">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswa->nama }}" required autocomplete="nama">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $mahasiswa->email }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Beasiswa</label>
                        <select name="beasiswa" required class="form-control">
                            <?php
                            $beasiswa = $mahasiswa->beasiswa;
                            if ($beasiswa == 'Berprestasi') {
                            ?>
                                <option value="Berprestasi">Berprestasi</option>
                                <option value="Kurang Mampu">Kurang Mampu</option>
                            <?php
                            } else {
                            ?>
                                <option value="Kurang Mampu">Kurang Mampu</option>
                                <option value="Berprestasi">Berprestasi</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection