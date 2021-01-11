@extends('mahasiswa.layouts.app')

@section('content')
<div style="margin: 0 auto;" class="col-md-8">
    <div class="card">
        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Edit Password</h4>
            </div>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('akun_mahasiswa.update', $mahasiswa->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <br>
                <div class="col">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">save</i> Simpan</button>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection