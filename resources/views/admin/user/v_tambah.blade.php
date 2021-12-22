@extends('layouts.backend')

@section('content')



<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Jenjang</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <form action="/user/insert" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Admin">
                            <div class="text-danger">
                                @error('name')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail">
                            <div class="text-danger">
                                @error('email')
                                {{ $message}}
                                @enderror
                            </div>                            
                        </div>
                    </div>    
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                            <div class="text-danger">
                                @error('password')
                                {{ $message}}
                                @enderror
                            </div>                            
                        </div>
                    </div>                                           
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/user"  class="btn btn-warning float-right"> Batal</a>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- bootstrap color picker -->
@endsection