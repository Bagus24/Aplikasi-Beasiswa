@extends('mahasiswa.layouts.app')

@section('content')
<div style="margin: 0 auto;" class="col-md-8">
    <div class="card">

        <div class="card-header card-header-primary">
            <h4 class="card-title">Lampiran</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('lampiran_mhs.store') }}" enctype="multipart/form-data">
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

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Foto Kartu Keluarga</label>
                        <div class="col-md-8">
                            <input name="kk" id="input_kk" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('kk') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_kk" class="btn btn-danger"><i class="material-icons">perm_media</i></button>
                            @error('kk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4"></label>
                        <div class="col-md-8">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_kk" alt=" " class="img-thumbnail img-responsive">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Foto Kartu Tanda Penduduk</label>
                        <div class="col-md-8">
                            <input name="ktp" id="input_ktp" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('ktp') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_ktp" class="btn btn-danger"><i class="material-icons">perm_media</i></button>
                            @error('ktp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4"></label>
                        <div class="col-md-8">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_ktp" src="" alt="..." class="img-thumbnail img-responsive">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Foto Kartu Mahasiswa</label>
                        <div class="col-md-8">
                            <input name="km" id="input_km" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('km') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_km" class="btn btn-danger"><i class="material-icons">perm_media</i></button>
                            @error('km')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4"></label>
                        <div class="col-md-8">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_km" src="" alt="..." class="img-thumbnail img-responsive">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Foto Transkrip Nilai</label>
                        <div class="col-md-8">
                            <input name="tn" id="input_tn" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('tn') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_tn" class="btn btn-danger"><i class="material-icons">perm_media</i></button>
                            @error('tn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4"></label>
                        <div class="col-md-8">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_tn" src="" alt="..." class="img-thumbnail img-responsive">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Foto Rekening</label>
                        <div class="col-md-8">
                            <input name="rek" id="input_rek" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('rek') is-invalid @enderror" style="display: none;" required>
                            <button type="button" id="btn_rek" class="btn btn-danger"><i class="material-icons">perm_media</i></button>
                            @error('rek')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4"></label>
                        <div class="col-md-8">
                            <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_rek" src="" alt="..." class="img-thumbnail img-responsive">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Tidak Terima Beasiswa</label>
                        <div class="col-md-8">
                            <a target="_blank" href="https://drive.google.com/file/d/10BIp2nDgpkm92sIO87Jlw69AyR0VjrPt/view?usp=sharing" class="btn btn-success"><i class="material-icons">get_app</i></a>
                            <label for="ttb" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <input id="text_ttb" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text">
                            <input type="file" accept=".doc,.docx" class="form-control @error('ttb') is-invalid @enderror col-md-8" style="display: none;" name="ttb" id="ttb" required>
                            @error('ttb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Akreditasi Kampus</label>
                        <div class="col-md-8">
                            <label for="ak" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_ak" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('ak') is-invalid @enderror col-md-8" style="display: none;" name="ak" id="ak" required>
                            @error('ak')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Akreditasi Prodi</label>
                        <div class="col-md-8">
                            <label for="ap" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_ap" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('ap') is-invalid @enderror col-md-8" style="display: none;" name="ap" id="ap" required>
                            @error('ap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Bebas Narkoba</label>
                        <div class="col-md-8">
                            <a target="_blank" href="https://drive.google.com/file/d/1_WVpnpXBqG2pQQukEbpW4gz-sw03ncbu/view?usp=sharing" class="btn btn-success"><i class="material-icons">get_app</i></a>
                            <label for="bn" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_bn" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('bn') is-invalid @enderror col-md-8" style="display: none;" name="bn" id="bn" required>
                            @error('bn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Keterangan Aktif Kuliah</label>
                        <div class="col-md-8">
                            <label for="kak" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_kak" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('kak') is-invalid @enderror col-md-8" style="display: none;" name="kak" id="kak" required>
                            @error('kak')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Permohonan</label>
                        <div class="col-md-8">
                            <a target="_blank" href="https://drive.google.com/file/d/11hqdYStgHlftymhvn6pmICCeLA0t9V9N/view?usp=sharing" class="btn btn-success"><i class="material-icons">get_app</i></a>
                            <label for="sp" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_sp" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('sp') is-invalid @enderror col-md-8" style="display: none;" name="sp" id="sp" required>
                            @error('sp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Pakta Integritas</label>
                        <div class="col-md-8">
                            <label for="pi" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_pi" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('pi') is-invalid @enderror col-md-8" style="display: none;" name="pi" id="pi" required>
                            @error('pi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="exampleFile" class="col-md-4">Surat Keterangan Kurang Mampu</label>
                        <div class="col-md-8">
                            <label for="kkm" class="btn btn-info"><i class="material-icons">backup</i></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">

                            <input id="text_kkm" style="display: none;" placeholder="nama file.." class="form-control col-md-12" type="text" >
                            <input type="file" accept=".doc,.docx" class="form-control @error('kkm') is-invalid @enderror col-md-8" style="display: none;" name="kkm" id="kkm" required>
                            @error('kkm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>





                    <script>
                        document.getElementById("ttb").onchange = function() {
                            document.getElementById("text_ttb").style.display = "inline";
                            document.getElementById("text_ttb").value = this.value;
                        };

                        document.getElementById("ak").onchange = function() {
                            document.getElementById("text_ak").style.display = "inline";
                            document.getElementById("text_ak").value = this.value;
                        };

                        document.getElementById("ap").onchange = function() {
                            document.getElementById("text_ap").style.display = "inline";
                            document.getElementById("text_ap").value = this.value;
                        };

                        document.getElementById("bn").onchange = function() {
                            document.getElementById("text_bn").style.display = "inline";
                            document.getElementById("text_bn").value = this.value;
                        };

                        document.getElementById("kak").onchange = function() {
                            document.getElementById("text_kak").style.display = "inline";
                            document.getElementById("text_kak").value = this.value;
                        };

                        document.getElementById("sp").onchange = function() {
                            document.getElementById("text_sp").style.display = "inline";
                            document.getElementById("text_sp").value = this.value;
                        };

                        document.getElementById("pi").onchange = function() {
                            document.getElementById("text_pi").style.display = "inline";
                            document.getElementById("text_pi").value = this.value;
                        };

                        document.getElementById("kkm").onchange = function() {
                            document.getElementById("text_kkm").style.display = "inline";
                            document.getElementById("text_kkm").value = this.value;
                        };
                    </script>



                    <br>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    //KK
    var btn_kk = document.getElementById('btn_kk');
    var gbr_kk = document.getElementById('gambar_kk');
    var input_kk = document.getElementById('input_kk');
    btn_kk.addEventListener('click', function() {
        input_kk.click();
    })
    input_kk.addEventListener('change', function() {
        gambar_kk(this);
    })

    function gambar_kk(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_kk').src = e.target.result;
            }
            gbr_kk.style.display = "inline";
            reader.readAsDataURL(a.files[0]);
        }
    }

    //KTP
    var btn_ktp = document.getElementById('btn_ktp');
    var input_ktp = document.getElementById('input_ktp');
    var gbr_ktp = document.getElementById('gambar_ktp');
    btn_ktp.addEventListener('click', function() {
        input_ktp.click();
    })
    input_ktp.addEventListener('change', function() {
        gambar_ktp(this);
    })

    function gambar_ktp(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_ktp').src = e.target.result;
            }
            gbr_ktp.style.display = "inline";
            reader.readAsDataURL(a.files[0]);
        }
    }

    //KM
    var btn_km = document.getElementById('btn_km');
    var input_km = document.getElementById('input_km');
    var gbr_km = document.getElementById('gambar_km');
    btn_km.addEventListener('click', function() {
        input_km.click();
    })
    input_km.addEventListener('change', function() {
        gambar_km(this);
    })

    function gambar_km(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_km').src = e.target.result;
            }
            gbr_km.style.display = "inline";
            reader.readAsDataURL(a.files[0]);
        }
    }

    //TN
    var btn_tn = document.getElementById('btn_tn');
    var input_tn = document.getElementById('input_tn');
    var gbr_tn = document.getElementById('gambar_tn');
    btn_tn.addEventListener('click', function() {
        input_tn.click();
    })
    input_tn.addEventListener('change', function() {
        gambar_tn(this);
    })

    function gambar_tn(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_tn').src = e.target.result;
            }
            gbr_tn.style.display = "inline";
            reader.readAsDataURL(a.files[0]);
        }
    }

    //REK
    var btn_rek = document.getElementById('btn_rek');
    var input_rek = document.getElementById('input_rek');
    var gbr_rek = document.getElementById('gambar_rek');
    btn_rek.addEventListener('click', function() {
        input_rek.click();
    })
    input_rek.addEventListener('change', function() {
        gambar_rek(this);
    })

    function gambar_rek(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_rek').src = e.target.result;
            }
            gbr_rek.style.display = "inline";
            reader.readAsDataURL(a.files[0]);
        }
    }
</script>

@endsection