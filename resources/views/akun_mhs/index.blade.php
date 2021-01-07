@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">

        <div class="card-header card-header-primary">
            <h4 class="card-title ">Tabel Akun Mahasiswa</h4>
        </div>
        <div class="card-body">
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
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            No
                        </th>
                        <th>
                            Nama Mahasiswa
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Jenis Beasiswa
                        </th>
                        <th class="text-center">
                            Aksi
                        </th>
                    </thead>
                    <tbody>
                        @if ($mahasiswa->count() > 0)
                        <?php $no = 0; ?>
                        @foreach($mahasiswa as $m)
                        <?php $no++; ?>
                        <tr>
                            <td>
                                {{ $no }}
                            </td>
                            <td>
                                {{ $m->nama }}
                            </td>
                            <td>
                                {{ $m->email }}
                            </td>
                            <td>
                                {{ $m->beasiswa }}
                            </td>

                            <td class="td-actions text-center">


                                <form id="data-{{ $m->id }}" action="{{ route('akun_mhs.destroy', $m->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('akun_mhs.edit', $m->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button onclick="hapusAkun( {{ $m->id }} )" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td></td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        {{ $mahasiswa->links() }}
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<script>
    function hapusAkun(id) {
        Swal.fire({
            title: 'Hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#data-' + id).submit();
            }
        })

    }
</script>

@endsection