@extends('layouts.mapLayout')
        

@section('content')

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
        

              <div id="formContainer">
              <div id="distance"></div>

              <form action="/" method="POST" class="form">
                @csrf


              <!--  DISPLAY:NONE   -->
              <input type="number" name="distancia" id="distancia" step="any"> 
              <!--  DISPLAY:NONE   -->

 
             
              <input type="radio" id="flete" name="costo">
              <label for="flete">Miniflete (hasta 1100Kg): $ <span id="fletePrint"></span> </label> <br>
              <input type="radio" id="bici" name="costo">
               <label for="bici">Mensajeria (hasta 4Kg): $ <span id="biciPrint"></span> </label>  

               <input type="submit" value="Ordene su Pizza">
            </form>

              </div>
             
               <div>


       



             </div>
        </div>



    </div>

<div id="map">

</div>



@endsection