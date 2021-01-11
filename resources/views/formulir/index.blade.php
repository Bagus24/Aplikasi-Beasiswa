@extends('layouts.app')

@section('content')
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
@if (Session::has('hapus'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah terhapus!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Tabel Formulir</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead>
                        <th>
                            No
                        </th>
                        <th>
                            Nama Mahasiswa
                        </th>
                        <th>
                            KTP
                        </th>
                        <th>
                            No. HP
                        </th>
                        <th>
                            Tempat Lahir
                        </th>
                        <th>
                            Tanggal Lahir
                        </th>
                        <th>
                            Jenis Kelamin
                        </th>
                        <th>
                            Agama
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Kecamatan
                        </th>
                        <th>
                            Desa
                        </th>
                        <th>
                            NIM
                        </th>
                        <th>
                            Nama Kampus
                        </th>
                        <th>
                            Fakultas
                        </th>
                        <th>
                            Jurusan
                        </th>
                        <th>
                            Akreditasi Kampus
                        </th>
                        <th>
                            Akreditasi Prodi
                        </th>
                        <th>
                            Tahun Angkatan
                        </th>
                        <th>
                            IPK
                        </th>
                        <th>
                            No. Rekening
                        </th>
                        <th>
                            Nama Bank
                        </th>
                        <th>
                            Nama Dibuku Rekening
                        </th>
                        <th>
                            Nama Ayah
                        </th>
                        <th>
                            Nama Ibu
                        </th>
                        <th>
                            Jumlah Saudara
                        </th>
                        <th>
                            Pekerjaan Ibu
                        </th>
                        <th>
                            Pekerjaan Ayah
                        </th>
                        <th>
                            Foto
                        </th>

                    </thead>
                    <tbody>
                        @if ($formulir->count() > 0)
                        <?php $no = 0; ?>
                        @foreach($formulir as $f)
                        <?php $no++; ?>
                        <tr>
                            <td>
                                {{ $no }}
                            </td>
                            <td>
                                {{ $f->nama }}
                            </td>
                            <td>
                                {{ $f->no_ktp }}
                            </td>
                            <td>
                                {{ $f->no_hp }}
                            </td>
                            <td>
                                {{ $f->tempat_lahir }}
                            </td>
                            <td>
                                {{ $f->tgl_lahir }}
                            </td>
                            <td>
                                {{ $f->jk }}
                            </td>
                            <td>
                                {{ $f->agama }}
                            </td>
                            <td>
                                {{ $f->alamat }}
                            </td>
                            <td>
                                {{ $f->kec }}
                            </td>
                            <td>
                                {{ $f->desa }}
                            </td>
                            <td>
                                {{ $f->nim }}
                            </td>
                            <td>
                                {{ $f->nama_kampus }}
                            </td>
                            <td>
                                {{ $f->fakultas }}
                            </td>
                            <td>
                                {{ $f->jurusan }}
                            </td>
                            <td>
                                {{ $f->akre_kampus }}
                            </td>
                            <td>
                                {{ $f->akre_prodi }}
                            </td>
                            <td>
                                {{ $f->thn_angkatan }}
                            </td>
                            <td>
                                {{ $f->ipk }}
                            </td>
                            <td>
                                {{ $f->no_rek }}
                            </td>
                            <td>
                                {{ $f->bank }}
                            </td>
                            <td>
                                {{ $f->nama_rek }}
                            </td>
                            <td>
                                {{ $f->nama_ayah }}
                            </td>
                            <td>
                                {{ $f->nama_ibu }}
                            </td>
                            <td>
                                {{ $f->jml_saudara }}
                            </td>
                            <td>
                                {{ $f->pekerjaan_ibu }}
                            </td>
                            <td>
                                {{ $f->pekerjaan_ayah }}
                            </td>
                            <td>
                              
                                <img src="{{ url('images/'. $f->foto) }}" style="height: 50px; width: 50px">
                            </td>

                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td></td>
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
                    <nav aria-label="...">
                        <ul class="pagination">
                            {{ $formulir->links() }}
                        </ul>
                    </nav>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection