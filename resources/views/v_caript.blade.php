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
        ]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    var overlayer = {                            
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
    

//sample data values for populate map
var data = [
        <?php foreach ($perguruantinggi as $key => $value) { ?>
            {"posisi":[<?= $value->posisi ?>], "nama_pt":"<?= $value->nama_pt ?>"},
        <?php } ?>		
	];
    //var markersLayer = new L.LayerGroup();	//layer contain searched elements
	
	

	var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 15,
		marker: false
	});

	map.addControl( controlSearch );

	////////////populate map with markers from sample data
	for(i in data) {    
		var nama_pt = data[i].nama_pt;	//value searched
		var	posisi = data[i].posisi;		//position found
		marker = new L.Marker(new L.latLng(posisi), {title: nama_pt} );//se property searched
		marker.bindPopup('nama_pt: '+ nama_pt );
		markersLayer.addLayer(marker);
	}

</Script>
@endsection