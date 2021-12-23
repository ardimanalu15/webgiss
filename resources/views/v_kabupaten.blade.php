@extends('Layouts.frontend')
@section('content')
    

<div id="map" style="width: 100%; height: 500px;"></div>

<Script>
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

   
    var data{{ $kab->id_kabupaten }}= L.layerGroup();
    
    @foreach($jenjang as $data)
    var jenjang{{ $data->id_jenjang }}= L.layerGroup();
    @endforeach 

    var map = L.map('map', {
        center: [-2.998631991713321, 104.78355351301558],
        zoom: 11,
        layers: [peta1,
        data{{ $kab->id_kabupaten }},
        @foreach($jenjang as $data)
         jenjang{{ $data->id_jenjang }},
        @endforeach
        ]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

   
    var overlayer = {
        "{{ $kab->nama_kabupaten}}": data{{ $kab->id_kabupaten }},
        @foreach($jenjang as $data)
        "{{ $data->jenjang}}": jenjang{{ $data->id_jenjang }},
        @endforeach                  
    };

    L.control.layers(baseMaps, overlayer).addTo(map);

    
    var kab = L.geoJSON(<?= $kab->geojson ?>,{
        style: {
            color: 'white',
            fillColor: '{{ $kab->warna }}',
            fillOpacity: 0.8,
        },
    }).addTo(data{{ $kab->id_kabupaten }});
        map.fitBounds(kab.getBounds());

        @foreach($sekolah as $data)
         var myIcon = L.icon({
          iconUrl: '{{asset('sma2.ico')}}',
         iconSize: [40, 50],
        });

    var informasi = '<table class="table table-bordered"><tbody><tr><td>Nama Sekolah</td><td>{{ $data->nama_sekolah }}</td></tr><tr><td>Jenjang</td><td>{{ $data->jenjang }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr></tbody></table>'
        L.marker([<?= $data->posisi ?>],{icon: myIcon}).addTo(map)
        .bindPopup(informasi);
    @endforeach
    
    @foreach($perguruantinggi as $data)
    var myIcon = L.icon({
    iconUrl: '{{asset('kuliah.png')}}',
    iconSize: [40, 50],
        });
    var informasi = '<table class="table table-bordered"><tbody><tr><td>Nama Sekolah</td><td>{{ $data->nama_pt }}</td></tr><tr><td>Jenjang</td><td>{{ $data->jenjang }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr></tbody></table>'
    L.marker([<?= $data->posisi ?>],{icon: myIcon}).addTo(map)
    .bindPopup(informasi);
    @endforeach

</Script>
@endsection