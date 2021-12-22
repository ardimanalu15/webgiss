@extends('layouts.backend')

@section('content')


<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data {{ $title }}</h3>

            <div class="card-tools">
                <a href="/sekolah/tambah" type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus fa-sm"></i> Tambah Data </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ( session('pesan') )
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> {{session('pesan')}}</h5>
            </div>
            @endif
            <table id="example1" class="table table-bordered table-striped text-sm">
                <thead>
                    <tr>
                        <th width="30px" class="text-center">No</th>
                        <th width="100px">Alamat</th>
                        <th>Nama Sekolah</th>
                        <th width="100px">Jenjang Pendidikan</th>
                        <th width="100px">Kabupaten</th>
                        <th width="50px">Status</th>
                        <th width="50px">Posisi</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($sekolah as $data)
                    <tr>
                        <td class="text-center"> {{ $no++ }} </td>
                        <td> {{ $data->alamat }} </td>
                        <td> {{ $data->nama_sekolah }} </td>
                        <td> {{ $data->jenjang }} </td>
                        <td> {{ $data->nama_kabupaten }} </td>                    
                        <td> {{ $data->status }} </td>
                        <td> {{ $data->posisi }} </td>
                        <td>
                            <a href="/sekolah/edit/{{$data->id_sekolah}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_sekolah}}" style="margin-left: 10px;"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@foreach ($sekolah as $data)

<div class="modal modal-danger fade" id="delete{{ $data->id_sekolah }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $data->nama_sekolah }}</b>....?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">keluar</button>
                <a href="/sekolah/delete/{{ $data->id_sekolah }}" type="button" class="btn btn-outline-light">Iya</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endsection