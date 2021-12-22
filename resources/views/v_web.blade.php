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

    
    @foreach($kabupaten as $data)
    var kabupaten{{ $data->id_kabupaten }}= L.layerGroup();
    @endforeach  

    var markersLayer = new L.LayerGroup();

    var sekolah= L.layerGroup();
    
    var pt=L.layerGroup();
   
    var map = L.map('map', {
        center: [-2.998631991713321, 104.78355351301558],
        zoom: 11,
        layers: [peta1,
        @foreach($kabupaten as $data)
         kabupaten{{ $data->id_kabupaten }},
        @endforeach
        sekolah,pt,      
        ]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    var overlayer = {       
        "SMA": sekolah,
        "Perguruan Tinggi": pt,      
        @foreach($kabupaten as $data)
       "{{ $data->nama_kabupaten}}": kabupaten{{ $data->id_kabupaten }},
       @endforeach          
       
         
   };

    L.control.layers(baseMaps, overlayer).addTo(map);

    @foreach($kabupaten as $data)
    L.geoJSON(<?= $data->geojson ?>, {
        style: {
            color: '#00f794',
            fillColor: '{{ $data->warna }}',
            fillOpacity: 0.8,
        },
    }).addTo(kabupaten{{  $data->id_kabupaten }}).bindPopup("{{ $data->nama_kabupaten }}");
    @endforeach

    @foreach($sekolah as $data)
    var myIcon = L.icon({
    iconUrl: 'sma2.ico',
    iconSize: [30, 30],
        });

    var informasi = '<table class="table table-bordered"><tbody><tr><td>Nama Sekolah</td><td>{{ $data->nama_sekolah }}</td></tr><tr><td>Jenjang</td><td>{{ $data->jenjang }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr></tbody></table>'
        L.marker([<?= $data->posisi ?>],{icon: myIcon}).addTo(sekolah)
        .bindPopup(informasi);
    @endforeach

    @foreach($perguruantinggi as $data)
    var myIcon = L.icon({
    iconUrl: 'kuliah.png',
    iconSize: [40, 50],
        });
    var informasi = '<table class="table table-bordered"><tbody><tr><td>Nama Sekolah</td><td>{{ $data->nama_pt }}</td></tr><tr><td>Jenjang</td><td>{{ $data->jenjang }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr></tbody></table>'
    L.marker([<?= $data->posisi ?>],{icon: myIcon}).addTo(pt)
    .bindPopup(informasi);
    @endforeach


</Script>
@endsection