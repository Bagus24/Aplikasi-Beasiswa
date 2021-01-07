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
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Tabel Formulir</h4>
        </div>
        <div class="card-body">
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
                            No. HP
                        </th>
                        <th>
                            Nama Kampus
                        </th>
                        <th class="text-center">
                            Aksi
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
                                {{ $f->no_hp }}
                            </td>
                            <td>
                                {{ $f->nama_kampus }}
                            </td>
                            <td class="td-actions text-center">
                                <form id="data-{{ $f->id }}" action="{{ route('formulir.destroy', $f->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button id="detail" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong" data-nama="{{ $f->nama }}">
                                    <i class="material-icons">description</i>
                                </button>
                                <a href="{{ route('formulir.edit', $f->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button onclick="hapusFormulir( {{ $f->id }} )" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Rincian Formulir</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
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


<script>
    function hapusFormulir(id) {
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