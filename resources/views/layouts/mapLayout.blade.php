<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Tutorial</title>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }

        .coordinate {
            position: absolute;
            bottom: 10px;
            right: 50%;
        }

        #banner {
            width: 100%;
            height: 10vh;
            border: solid;
            border-width: 4px;
            border-style: double;
        }

        .flex-container {
           display: flex;
           flex-wrap: nowrap;
        }

        .flex-container > div {

           margin: 20px;

        } 
    </style>
</head>

<body>

    <div id="banner">

        <div class="flex-container">
            <div id="left">
                <div id="latitude.a"></div><br>
                <div id="longitude.a"></div>
             </div>
        
             <div id="right">
                <div id="latitude.b"></div><br>
                <div id="longitude.b"></div>
             </div>
        
             <div id="distance">
                <p></p>
                <p></p>
                <p></p>            

             </div>            
        </div>



    </div>

    @yield('content')

</body>

</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>



<script>

    // Map initialization 
    var map = L.map('map').setView([-34.609179, -58.446373], 12);
    
    map.options.minZoom = 12;
    map.options.maxZoom = 16;

    //map.dragging.disable();

    /*==============================================
                TILE LAYER and WMS
    ================================================*/
    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        draggable: 'false',
    });
    osm.addTo(map);
    // map.addLayer(osm)

   
    // marcadores iniciales
    //Marker 1
    let markA = L.marker([-34.62, -58.39], {
        draggable: 'true',
    }).addTo(map);


    //Marker 2
    let markB = L.marker([-34.62, -58.48], {
        draggable: 'true',
        opacity: .7,
    }).addTo(map);
    

    document.getElementById('distance').innerHTML = 'Distancia en Km: ' + 8.2;

    //Polilines


  let active_polyline = L.featureGroup().addTo(map); 


  function printDist()  {
     
     let length = map.distance([markA.getLatLng().lat, markA.getLatLng().lng], 
                                 [markB.getLatLng().lat, markB.getLatLng().lng]);
     let printLng = parseFloat(length / 1000).toFixed(1)
     document.getElementById('distance').innerHTML = 'Distancia en Km: ' + printLng;        

  }

  function polyline() {

  let _polyline = L.polyline([[markA.getLatLng().lat, markA.getLatLng().lng], 
                                 [markB.getLatLng().lat, markB.getLatLng().lng]], {
                                    color: 'red'
                     }).addTo(map).addTo(active_polyline);

  } 

    map.on('load', polyline());
               

    markA.on('mousemove dragend', function (e) {

        active_polyline.clearLayers();

        polyline();
        
        document.getElementById('latitude.a').innerText = markA.getLatLng().lat;
        document.getElementById('longitude.a').innerText = markA.getLatLng().lng;

        printDist();

    });


    markB.on('mousemove dragend', function (e) {

        active_polyline.clearLayers();
        
        polyline();

        document.getElementById('latitude.b').innerText = markB.getLatLng().lat;
        document.getElementById('longitude.b').innerText = markB.getLatLng().lng;
        
        printDist();

    });



</script>   