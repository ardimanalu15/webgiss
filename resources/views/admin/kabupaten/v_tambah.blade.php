@extends('layouts.backend')

@section('content')



<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
           
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <form action="/kabupaten/insert" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode Kabupaten">
                            <div class="text-danger">
                                @error('kode')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <input type="text" name="nama_kabupaten" class="form-control" placeholder="Nama Kabupaten">
                            <div class="text-danger">
                                @error('nama_kabupaten')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label>GEOJSON</label>
                        <textarea name="geojson" rows="5" class="form-control"></textarea>
                        <div class="text-danger">
                            @error('geojson')
                            {{ $message}}
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Warna</label>

                            <div class="input-group my-colorpicker2">
                                <input name="warna" class="form-control" placeholder="Pilih Warna">

                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <div class="text-danger">
                                @error('warna')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/kabupaten" class="btn btn-warning float-right"> Batal</a>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
</script>
@endsection