@extends('mahasiswa.layouts.app')

@section('content')

<div style="margin: 0 auto;" class="col-md-8">
    <div class="card">

        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Formulir</h4>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('formulir_mhs.update', $formulir->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <br>
                <div class="col">


                    <input type="hidden" class="form-control @error('id_user') is-invalid @enderror" value="{{ auth()->guard('mahasiswa')->user()->id }}" name="id_user" required>
                    @error('id_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <input type="hidden" class="form-control @error('nama') is-invalid @enderror" value="{{ auth()->guard('mahasiswa')->user()->nama }}" name="nama" required>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="form-group">
                        <label class="bmd-label-floating">No KTP</label>
                        <input value="{{ $formulir->no_ktp }}" maxlength="16" type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" required>
                        @error('no_ktp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">No HP (harus aktif)</label>
                        <input value="{{ $formulir->no_hp }}" maxlength="13" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required>
                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Tempat Lahir</label>
                        <input value="{{ $formulir->tempat_lahir }}" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" required>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bmd-label-floating">Tanggal Lahir</label>
                        <input value="{{ $formulir->tgl_lahir }}" maxlength="10" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required>
                        @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="jk" class="form-control">

                            <?php
                            $jk = $formulir->jk;
                            if ($jk == 'Laki-laki') {
                            ?>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php
                            } else {
                            ?>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Agama</label>
                        <input value="{{ $formulir->agama }}" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" required>
                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control @error('agama') is-invalid @enderror" rows="3" required>{{ $formulir->alamat }}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Kecamatan</label>
                        <input value="{{ $formulir->kec }}" type="text" class="form-control @error('kec') is-invalid @enderror" name="kec" required>
                        @error('kec')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Desa</label>
                        <input value="{{ $formulir->desa }}" type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" required>
                        @error('desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">NIM</label>
                        <input value="{{ $formulir->nim }}" type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" required>
                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Kampus</label>
                        <input value="{{ $formulir->nama_kampus }}" type="text" class="form-control @error('nama_kampus') is-invalid @enderror" name="nama_kampus" required>
                        @error('nama_kampus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Fakultas (contoh: Ekonomi)</label>
                        <input value="{{ $formulir->fakultas }}" type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" required>
                        @error('fakultas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Jurusan/Prodi (contoh: Ekonomi)</label>
                        <input value="{{ $formulir->jurusan }}" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" required>
                        @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Akreditasi Kampus</label>
                        <input value="{{ $formulir->akre_kampus }}" type="text" class="form-control @error('akre_kampus') is-invalid @enderror" name="akre_kampus" required>
                        @error('akre_kampus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Akreditasi Prodi</label>
                        <input value="{{ $formulir->akre_prodi }}" type="text" class="form-control @error('akre_prodi') is-invalid @enderror" name="akre_prodi" required>
                        @error('akre_prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Tahun Angkatan</label>
                        <input value="{{ $formulir->thn_angkatan }}" maxlength="4" type="number" class="form-control @error('thn_angkatan') is-invalid @enderror" name="thn_angkatan" required>
                        @error('thn_angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">IPK</label>
                        <input value="{{ $formulir->ipk }}" type="text" class="form-control @error('ipk') is-invalid @enderror" name="ipk" required>
                        @error('ipk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">No. Rekening</label>
                        <input value="{{ $formulir->no_rek }}" type="text" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek" required>
                        @error('no_rek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Jenis Bank</label>
                        <input value="{{ $formulir->bank }}" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" required>
                        @error('bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Dibuku Rekening</label>
                        <input value="{{ $formulir->nama_rek }}" type="text" class="form-control @error('nama_rek') is-invalid @enderror" name="nama_rek" required>
                        @error('nama_rek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Ayah</label>
                        <input value="{{ $formulir->nama_ayah }}" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" required>
                        @error('nama_ayah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Ibu</label>
                        <input value="{{ $formulir->nama_ibu }}" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" required>
                        @error('nama_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Jumlah Saudara</label>
                        <input value="{{ $formulir->jml_saudara }}" type="number" class="form-control @error('jml_saudara') is-invalid @enderror" name="jml_saudara" required>
                        @error('jml_saudara')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Pekerjaan Ibu</label>
                        <input value="{{ $formulir->pekerjaan_ibu }}" type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" required>
                        @error('pekerjaan_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Pekerjaan Ayah</label>
                        <input value="{{ $formulir->pekerjaan_ayah }}" type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" required>
                        @error('pekerjaan_ayah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection