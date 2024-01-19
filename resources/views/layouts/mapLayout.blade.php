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
            font-family: 'Courier New', Courier, monospace;
            font-size: 80%;
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
            height: 9vh;
            border: solid;
            border-width: 4px;
            border-style: double;
        }

        .flex-container {
           display: flex;
           flex-wrap: nowrap;
        }

        .flex-container > div {

           margin: 4px;
           padding: 3px;
           border: solid;
           font-weight: bold;
           background-color: greenyellow;
        } 

        #distancia {
            display: none;
        }



        #distance {
           text-align: center;
        }

        #formContainer {
           width: 28vw;
        }


    </style>
</head>

<body>



    @yield('content')
</body>

</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>



<script>

    // Map initialization 
    var map = L.map('map').setView([-34.63, -58.46], 12);
    
    map.options.minZoom = 12;
    map.options.maxZoom = 16;

    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        draggable: 'false',
    });
    osm.addTo(map);

    var bounds = L.latLngBounds([[-34.5, -58.67], [-34.72, -58.30]]);
    map.setMaxBounds(bounds);
    map.on('drag', function() {map.panInsideBounds(bounds, { animate: false }); });



   
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


     document.getElementById('longitude.a').innerText = markA.getLatLng().lng.toFixed(3);    
     document.getElementById('latitude.a').innerText = markA.getLatLng().lat.toFixed(3);
     document.getElementById('latitude.b').innerText = markB.getLatLng().lat.toFixed(3);
     document.getElementById('longitude.b').innerText = markB.getLatLng().lng.toFixed(3);

    //Polilines


  let active_polyline = L.featureGroup().addTo(map); 


  function inputs()  {
     
     let length = map.distance([markA.getLatLng().lat, markA.getLatLng().lng], 
                               [markB.getLatLng().lat, markB.getLatLng().lng] );
     let printLng = parseFloat(length / 1000).toFixed(3)

     document.getElementById('distance').innerHTML = 'Distancia en Km: ' + printLng;

     let fleteValue = parseFloat(3.2 * (length / 10)).toFixed(0);
     let biciValue = parseFloat(1.1 * (length / 10)).toFixed(0);

     document.getElementById('fletePrint').innerHTML = fleteValue;
     document.getElementById('flete').value = fleteValue;

     document.getElementById('biciPrint').innerHTML = biciValue;
     document.getElementById('bici').value = biciValue;

     document.getElementById('distancia').value =  printLng;



  }

  function polyline() {

  let _polyline = L.polyline([[markA.getLatLng().lat, markA.getLatLng().lng], 
                                 [markB.getLatLng().lat, markB.getLatLng().lng]], {
                                    color: 'red'
                     }).addTo(map).addTo(active_polyline);
                     
  } 

    map.on('load', polyline());
    map.on('load', inputs());

    markA.on('mousemove dragend', function (e) {

        active_polyline.clearLayers();

        polyline();
        
        document.getElementById('latitude.a').innerText = markA.getLatLng().lat.toFixed(3);;
        document.getElementById('longitude.a').innerText = markA.getLatLng().lng.toFixed(3);;

        inputs();

    });


    markB.on('mousemove dragend', function (e) {

        active_polyline.clearLayers();
        
        polyline();

        document.getElementById('latitude.b').innerText = markB.getLatLng().lat.toFixed(3);;
        document.getElementById('longitude.b').innerText = markB.getLatLng().lng.toFixed(3);;
        
        inputs();

    });




/*    const radioButtons = document.querySelectorAll('input[name="costo"]');

     for (const radioButton of radioButtons) {
           if (radioButton.checked) {
               document.getElementById('tipo').value = radioButton.id;
               break;
           }
       }                           */

</script>




