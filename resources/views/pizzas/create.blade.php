@extends('layouts.layout')
        

@section('content')


<div class="flex justify-center mt-6">
                   
    <div class="content">

        <div class="title m-b-md">

         <h1>Agregar nueva Pizza</h1>

         <form action="/pizzas" method="POST" class="form">
            @csrf
            <label for="cliente">Cliente
            <input type="text" name="cliente" id="cliente">
            </label>
            <br>
            <br>
            <label for="tipo">Tipo de Pizza:</label>
            <select name="tipo" id="tipo">
            <option value="Napolitana">Napolitana</option>
            <option value="Anchoas">Anchoas</option>
            <option value="Fugazzetta">Fugazzetta</option>
            <option value="Parmesana">Parmesana</option>

            </select>
            <br>
            <label for="precio">Tipo de Pizza:</label>
            <select name="precio" id="precio">
            <option value="$2000">$2000</option>
            <option value="$3000">$3000</option>
            <option value="$5000">$5000</option>

            </select>
            <br>
            <input type="submit" value="Ordene su Pizza">
         </form>





         </div>

    </div>

</div>

@endsection