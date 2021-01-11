@extends('mahasiswa.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">

        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Tabel Lampiran</h4>
            </div>
        </div>
        <div class="card-body">
            @if ($lampiran->count() == 0)
            <a href="{{ route('lampiran_mhs.create')}}" class="btn btn-success"><i class="material-icons">library_add</i> Tambah</a>
            @endif
            @if (Session::has('tambah'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data telah ditambah!',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
            @endif
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
            @if (Session::has('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lampiran telah tersedia!',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
            @endif
            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead>
                        <th>
                            Nama Mahasiswa
                        </th>
                        <th>
                            KK
                        </th>
                        <th>
                            KTP
                        </th>
                        <th>
                            Kartu Mahasiswa
                        </th>
                        <th>
                            Transkrip Nilai
                        </th>
                        <th>
                            Rekening
                        </th>
                        <th>
                            Surat Tidak Terima Beasiswa
                        </th>
                        <th>
                            Surat Akreditas Kampus
                        </th>
                        <th>
                            Surat Akreditas Prodi
                        </th>
                        <th>
                            Surat Bebas Narkoba
                        </th>
                        <th>
                            Surat Ket Aktif Kuliah
                        </th>
                        <th>
                            Surat Permohonan
                        </th>

                        <?php
                        $beasiswa = auth()->guard('mahasiswa')->user()->beasiswa;
                        if ($beasiswa == 'Kurang Mampu') {

                        ?>
                            <th>
                                Pakta Integritas
                            </th>
                            <th>
                                Surat Ket Kurang Mampu
                            </th>
                        <?php
                        }

                        ?>

                        <th class="text-center">
                            Aksi
                        </th>
                    </thead>
                    <tbody>
                        @if ($lampiran->count() > 0)
                        @foreach($lampiran as $l)
                        <tr>
                            <td>
                                {{ $l->nama }}
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->kk) }}" onclick="tampilKk()" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->ktp) }}" onclick="tampilKtp()" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->km) }}" onclick="tampilKm()" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->tn) }}" onclick="tampilTn()" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->rek) }}" onclick="tampilRek()" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->ttb) }}"><i class="material-icons">get_app</i> Download</a>

                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->ak) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->ap) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->bn) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->kak) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->sp) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <?php
                            $beasiswa = auth()->guard('mahasiswa')->user()->beasiswa;
                            if ($beasiswa == 'Kurang Mampu') {

                            ?>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ url('download', $l->pi) }}"><i class="material-icons">get_app</i> Download</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ url('download', $l->kkm) }}"><i class="material-icons">get_app</i> Download</a>
                                </td>
                            <?php
                            }

                            ?>
                            <td class="td-actions text-center">
                                <a href="{{ route('lampiran_mhs.edit', $l->id)}}" type="button" rel="tooltip" class="btn btn-warning">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>

                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <?php
                            $beasiswa = auth()->guard('mahasiswa')->user()->beasiswa;
                            if ($beasiswa == 'Kurang Mampu') {

                            ?>
                                <td>-</td>
                                <td>-</td>
                            <?php
                            }

                            ?>

                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<div id="tampil_data" style="display: none;" class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <button class="btn btn-danger pull-right" onclick="tutup()"><i class="material-icons">clear</i> Tutup</button>
                @foreach($lampiran as $l)
                <img style="display: none;" id="tampil_kk" src="{{ url('files/'. $l->kk) }}" class="img-thumbnail img-responsive">
                <img style="display: none;" id="tampil_ktp" src="{{ url('files/'. $l->ktp) }}" class="img-thumbnail img-responsive">
                <img style="display: none;" id="tampil_km" src="{{ url('files/'. $l->km) }}" class="img-thumbnail img-responsive">
                <img style="display: none;" id="tampil_tn" src="{{ url('files/'. $l->tn) }}" class="img-thumbnail img-responsive">
                <img style="display: none;" id="tampil_rek" src="{{ url('files/'. $l->rek) }}" class="img-thumbnail img-responsive">
                @endforeach


            </div>
        </div>
    </div>
</div>

<script>
    function tampilKk() {
        document.getElementById("tampil_data").style.display = "inline";
        document.getElementById("tampil_kk").style.display = "inline";
        document.getElementById("tampil_ktp").style.display = "none";
        document.getElementById("tampil_km").style.display = "none";
        document.getElementById("tampil_tn").style.display = "none";
        document.getElementById("tampil_rek").style.display = "none";
    }

    function tampilKtp() {
        document.getElementById("tampil_data").style.display = "inline";
        document.getElementById("tampil_kk").style.display = "none";
        document.getElementById("tampil_ktp").style.display = "inline";
        document.getElementById("tampil_km").style.display = "none";
        document.getElementById("tampil_tn").style.display = "none";
        document.getElementById("tampil_rek").style.display = "none";
    }

    function tampilKm() {
        document.getElementById("tampil_data").style.display = "inline";
        document.getElementById("tampil_kk").style.display = "none";
        document.getElementById("tampil_ktp").style.display = "none";
        document.getElementById("tampil_km").style.display = "inline";
        document.getElementById("tampil_tn").style.display = "none";
        document.getElementById("tampil_rek").style.display = "none";
    }

    function tampilTn() {
        document.getElementById("tampil_data").style.display = "inline";
        document.getElementById("tampil_kk").style.display = "none";
        document.getElementById("tampil_ktp").style.display = "none";
        document.getElementById("tampil_km").style.display = "none";
        document.getElementById("tampil_tn").style.display = "inline";
        document.getElementById("tampil_rek").style.display = "none";
    }

    function tampilRek() {
        document.getElementById("tampil_data").style.display = "inline";
        document.getElementById("tampil_kk").style.display = "none";
        document.getElementById("tampil_ktp").style.display = "none";
        document.getElementById("tampil_km").style.display = "none";
        document.getElementById("tampil_tn").style.display = "none";
        document.getElementById("tampil_rek").style.display = "inline";
    }

    function tutup() {
        document.getElementById("tampil_data").style.display = "none";
        document.getElementById("tampil_kk").style.display = "none";
        document.getElementById("tampil_ktp").style.display = "none";
        document.getElementById("tampil_km").style.display = "none";
        document.getElementById("tampil_tn").style.display = "none";
        document.getElementById("tampil_rek").style.display = "none";
    }
</script>

@endsection