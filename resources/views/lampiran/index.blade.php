@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">

        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Tabel Lampiran</h4>
            </div>
        </div>
        <div class="card-body">

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
                        <th>
                            Pakta Integritas
                        </th>
                        <th>
                            Surat Ket Kurang Mampu
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
                                <img src="{{ url('files/'. $l->kk) }}" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->ktp) }}" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->km) }}" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->tn) }}" style="height: 100px; width: 100px">
                            </td>
                            <td>
                                <img src="{{ url('files/'. $l->rek) }}" style="height: 100px; width: 100px">
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
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->pi) }}"><i class="material-icons">get_app</i> Download</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('download', $l->kkm) }}"><i class="material-icons">get_app</i> Download</a>
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
                            <td>-</td>
                            <td>-</td>

                        </tr>
                        @endif
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        {{ $lampiran->links() }}
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>



@endsection