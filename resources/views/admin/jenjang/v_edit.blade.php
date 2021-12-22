@extends('layouts.backend')

@section('content')



<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <form action="/jenjang/update/{{ $jenjang->id_jenjang }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Jenjang Pendidikan</label>
                            <input type="text" name="jenjang" value="{{$jenjang->jenjang}}" class="form-control" placeholder="Jenjang Pendidikan">
                            <div class="text-danger">
                                @error('jenjang')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/jenjang" class="btn btn-warning float-right"> Batal</a>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- bootstrap color picker -->
@endsection