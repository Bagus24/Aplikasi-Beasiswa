@extends('mahasiswa.layouts.app')

@section('content')

<?php
if ($hitung > 0) {


?>
    @if (Session::has('tambah'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data telah ditambahkan!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif
    @if (Session::has('edit'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data telah diubah!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif
    <div class="col-md-4">
        <div class="card">

            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Foto Profil</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('formulir_mhs/update-foto', $formulir->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="{{ url('images/'. $formulir->foto) }}" style="width: 400px; height: 350px" id="gambar_foto" src="" alt="..." class="img-thumbnail img-responsive">
                    </div>

                    <div class="row form-group">
                        <div style="margin: 0 auto;">
                            <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_foto" class="btn btn-danger btn-sm"><i class="material-icons">perm_media</i> Ganti foto</button>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-sm fileinput-exists"><i class="material-icons">save</i> Simpan</a>
                        </div>

                    </div>

                    <script>
                        var btn_foto = document.getElementById('btn_foto');
                        var input_foto = document.getElementById('input_foto');

                        btn_foto.addEventListener('click', function() {
                            input_foto.click();
                        })
                        input_foto.addEventListener('change', function() {
                            gambar_foto(this);
                        })

                        function gambar_foto(a) {
                            if (a.files && a.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('gambar_foto').src = e.target.result;
                                }
                                reader.readAsDataURL(a.files[0]);
                            }
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Rincian Formulir</h4>
                </div>
            </div>
            <div class="card-body">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nama</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nama }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nomor KTP</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->no_ktp }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nomor HP</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->no_hp }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Tempat, Tanggal Lahir</span>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $tanggal = $formulir->tgl_lahir;
                        $hari = substr($tanggal, 8, 2);
                        $bulan = substr($tanggal, 5, 2);
                        $tahun = substr($tanggal, 0, 4);
                        if ($bulan == '01') {
                            $bulan = 'Januari';
                        } elseif ($bulan == '02') {
                            $bulan = 'Februari';
                        } elseif ($bulan == '03') {
                            $bulan = 'Maret';
                        } elseif ($bulan == '04') {
                            $bulan = 'April';
                        } elseif ($bulan == '05') {
                            $bulan = 'Mei';
                        } elseif ($bulan == '06') {
                            $bulan = 'Juni';
                        } elseif ($bulan == '07') {
                            $bulan = 'Juli';
                        } elseif ($bulan == '08') {
                            $bulan = 'Agustus';
                        } elseif ($bulan == '09') {
                            $bulan = 'September';
                        } elseif ($bulan == '10') {
                            $bulan = 'Oktober';
                        } elseif ($bulan == '11') {
                            $bulan = 'November';
                        } elseif ($bulan == '12') {
                            $bulan = 'Desember';
                        }

                        $tempat = $formulir->tempat_lahir;

                        echo ": " . $tempat . ", " . $hari . " " . $bulan . " " . $tahun;
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Jenis Kelamin</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->jk }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Agama</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->agama }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Alamat</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->alamat }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Kecamatan</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->kec }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Desa</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->desa }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>NIM</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nim }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nama Kampus</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nama_kampus }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Fakultas</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->fakultas }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Jurusan</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->jurusan }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Akreditasi Kampus</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->akre_kampus }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Akreditasi Prodi</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->akre_prodi }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Tahun Angkatan</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->thn_angkatan }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>IPK</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->ipk }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nomor Rekening</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->no_rek }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Bank</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->bank }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nama Dibuku Rekening</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nama_rek }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nama Ayah</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nama_ayah }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Nama Ibu</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->nama_ibu }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Jumlah Saudara</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->jml_saudara }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Pekerjaan Ibu</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->pekerjaan_ibu }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span>Pekerjaan Ayah</span>
                    </div>
                    <div class="col-md-8">
                        <span>: {{ $formulir->pekerjaan_ayah }}</span>
                    </div>
                </div>
                <br>
                <a href="{{ route('formulir_mhs.edit', $formulir->id) }}" class="btn btn-warning pull-right"><i class="material-icons">create</i> Edit</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
} else {


?>
    <div style="margin: 0 auto;" class="col-md-8">
        <div class="card">
            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Formulir</h4>
                    <p class="card-category">Lengkapi formulir terlebih dahulu!</p>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('formulir_mhs.store') }}" enctype="multipart/form-data">
                    @csrf
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
                            <input maxlength="16" type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" required>
                            @error('no_ktp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">No HP (harus aktif)</label>
                            <input maxlength="13" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required>
                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" required>
                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bmd-label-floating">Tanggal Lahir</label>
                            <input maxlength="10" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required>
                            @error('tgl_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="jk" class="form-control">
                                <option value="">-- Jenis kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Agama</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" required>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control @error('agama') is-invalid @enderror" rows="3" required></textarea>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Kecamatan</label>
                            <input type="text" class="form-control @error('kec') is-invalid @enderror" name="kec" required>
                            @error('kec')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Desa</label>
                            <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" required>
                            @error('desa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">NIM</label>
                            <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" required>
                            @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Kampus</label>
                            <input type="text" class="form-control @error('nama_kampus') is-invalid @enderror" name="nama_kampus" required>
                            @error('nama_kampus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Fakultas (contoh: Ekonomi)</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" required>
                            @error('fakultas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Jurusan/Prodi (contoh: Ekonomi)</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" required>
                            @error('jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Akreditasi Kampus</label>
                            <input type="text" class="form-control @error('akre_kampus') is-invalid @enderror" name="akre_kampus" required>
                            @error('akre_kampus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Akreditasi Prodi</label>
                            <input type="text" class="form-control @error('akre_prodi') is-invalid @enderror" name="akre_prodi" required>
                            @error('akre_prodi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tahun Angkatan</label>
                            <input maxlength="4" type="number" class="form-control @error('thn_angkatan') is-invalid @enderror" name="thn_angkatan" required>
                            @error('thn_angkatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">IPK</label>
                            <input type="text" class="form-control @error('ipk') is-invalid @enderror" name="ipk" required>
                            @error('ipk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">No. Rekening</label>
                            <input type="text" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek" required>
                            @error('no_rek')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis Bank</label>
                            <input type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" required>
                            @error('bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Dibuku Rekening</label>
                            <input type="text" class="form-control @error('nama_rek') is-invalid @enderror" name="nama_rek" required>
                            @error('nama_rek')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Ayah</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" required>
                            @error('nama_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" required>
                            @error('nama_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Jumlah Saudara</label>
                            <input type="number" class="form-control @error('jml_saudara') is-invalid @enderror" name="jml_saudara" required>
                            @error('jml_saudara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Pekerjaan Ibu</label>
                            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" required>
                            @error('pekerjaan_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Pekerjaan Ayah</label>
                            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" required>
                            @error('pekerjaan_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="exampleFile">Foto</label>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                                <button type="button" id="btn_foto" class="btn btn-danger btn-sm"><i class="material-icons">perm_media</i> Pilih</button>
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_foto" src="" alt="..." class="img-thumbnail img-responsive">
                        </div>

                        <script>
                            var btn_foto = document.getElementById('btn_foto');
                            var input_foto = document.getElementById('input_foto');
                            var gbr_foto = document.getElementById('gambar_foto');
                            btn_foto.addEventListener('click', function() {
                                input_foto.click();
                            })
                            input_foto.addEventListener('change', function() {
                                gambar_foto(this);
                            })

                            function gambar_foto(a) {
                                if (a.files && a.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('gambar_foto').src = e.target.result;
                                    }
                                    gbr_foto.style.display = "inline";
                                    reader.readAsDataURL(a.files[0]);
                                }
                            }
                        </script>

                        <br>
                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">save</i> Simpan</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}

?>
@endsection