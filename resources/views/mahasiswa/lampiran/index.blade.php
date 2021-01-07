@extends('mahasiswa.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">

        <div class="card-header card-header-primary">
            <h4 class="card-title ">Tabel Lampiran</h4>
        </div>
        <div class="card-body">
            @if ($lampiran->count() == 0)
            <a href="{{ route('lampiran_mhs.create')}}" class="btn btn-warning">Tambah</a>
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
                <table class="table">
                    <thead class=" text-primary">
                        <th style="font-size: 12px;">
                            Nama Mahasiswa
                        </th>
                        <th style="font-size: 12px;">
                            KK
                        </th>
                        <th style="font-size: 12px;">
                            KTP
                        </th>
                        <th style="font-size: 12px;">
                            Kartu Mahasiswa
                        </th>
                        <th style="font-size: 12px;">
                            Transkrip Nilai
                        </th>
                        <th style="font-size: 12px;">
                            Rekening
                        </th>
                        <th style="font-size: 12px;">
                            Surat Tidak Terima Beasiswa
                        </th>
                        <th style="font-size: 12px;">
                            Surat Akreditas Kampus
                        </th>
                        <th style="font-size: 12px;">
                            Surat Akreditas Prodi
                        </th>
                        <th style="font-size: 12px;">
                            Surat Bebas Narkoba
                        </th>
                        <th style="font-size: 12px;">
                            Surat Ket Aktif Kuliah
                        </th>
                        <th style="font-size: 12px;">
                            Surat Permohonan
                        </th>
                        <th style="font-size: 12px;">
                            Pakta Integritas
                        </th>
                        <th style="font-size: 12px;">
                            Surat Ket Kurang Mampu
                        </th>
                        <th style="font-size: 12px;" class="text-center">
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
                                {{ $l->kk }}
                            </td>
                            <td>
                                {{ $l->ktp }}
                            </td>
                            <td>
                                {{ $l->km }}
                            </td>
                            <td>
                                {{ $l->tn }}
                            </td>
                            <td>
                                {{ $l->rek }}
                            </td>
                            <td>
                                {{ $l->ttb }}
                            </td>
                            <td>
                                {{ $l->ak }}
                            </td>
                            <td>
                                {{ $l->ap }}
                            </td>
                            <td>
                                {{ $l->bn }}
                            </td>
                            <td>
                                {{ $l->kak }}
                            </td>
                            <td>
                                {{ $l->sp }}
                            </td>
                            <td>
                                {{ $l->pi }}
                            </td>
                            <td>
                                {{ $l->kkm }}
                            </td>

                            <td class="td-actions text-center">
                                <a href="{{ route('lampiran_mhs.edit', $l->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>

                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

@endsection