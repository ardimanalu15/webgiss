@extends('layouts.backend')

@section('content')



<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>

           
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <form action="/sekolah/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                            <div class="text-danger">
                                @error('alamat')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                            <div class="text-danger">
                                @error('nama_pt')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                                <select type="text" name="status" class="form-control" >
                                    <option value="">Pilih Status Pendidikan</option> 
                                    <option value="negeri">Negeri</option> 
                                    <option value="swasta">Swasta</option> 
                                </select>   
                            <div class="text-danger">
                                @error('status')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenjang Pendidikan</label>
                            <select type="text" name="id_jenjang" class="form-control" >
                                <option value="">Pilih Jenjang Pendidikan</option>
                                @foreach($jenjang as $data)
                                <option value="{{ $data->id_jenjang }}">{{ $data->jenjang }}</option>
                                @endforeach    
                            </select>
                            <div class="text-danger">
                                @error('id_jenjang')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label> Kabupaten</label>
                            <select type="text" name="id_kabupaten" class="form-control" >
                                <option value="">Pilih Kabupaten</option>
                                @foreach($kabupaten as $data)
                                <option value="{{ $data->id_kabupaten }}">{{ $data->nama_kabupaten }}</option>
                                @endforeach     
                            </select>
                            <div class="text-danger"> 
                                @error('id_kabupaten')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" name="posisi" id="posisi" class="form-control" placeholder="Posisi Sekolah" >
                            <div class="text-danger">
                                @error('posisi')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label >Map </label> <label class="text-danger" style="margin-left: 200px;"> (Drag AND Drop marker untuk menentukan posisi SMA)</label>
                        <div id="map" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>                                              
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/sekolah" class="btn btn-warning float-right"> Batal</a>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- bootstrap color picker -->
<script>
var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });
    var map = L.map('map', {
        center: [-2.998631991713321, 104.78355351301558],
        zoom: 13,
        layers: [peta1],
    });
    var baseMaps = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };
    L.control.layers(baseMaps).addTo(map);

    //mengambil titik koordinat

    var curLocation =[-2.998631991713321, 104.78355351301558];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });
    map.addLayer(marker);

    marker.on('dragend',function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true',
        }).bindPopup(position).update();        
        $("#posisi").val(position.lat + "," + position.lng).keyup();
    });

    //ambil koordinat diklik
    var posisi = document.querySelector("[name=posisi]");
    map.on("click",function(event){
        var lat = event.latLng.lat;
        var lng = event.latLng.lng;
        if(!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        }else{
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });

</script>

@endsection