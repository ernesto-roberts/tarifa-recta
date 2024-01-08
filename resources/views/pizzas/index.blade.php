@extends('layouts.layout')
        

@section('content')



                   
    <div class="container">



         <h1>Pizzas</h1>

         <a href="/pizzas/create">Hacer Pedido</a>

         <br>


         <table class="table">

            <thead>

            <tr>
                  <th>Numero</th>
                  <th>Cliente</th>
                  <th>Tipo</th>
                  <th>Precio</th>
                  <th>Ver</th>  
                  <th>Completar</th> 
            </tr>

            </thead>



            @foreach($pizzas as $pizza)


                
            <tbody>


                <tr>
                    
                <td> {{ $pizza['id']  }} </td>
                <td> {{ $pizza['cliente'] }} </td>
                <td> {{ $pizza['tipo'] }} </td>
                <td> {{ $pizza['precio'] }} </td>
                <td> <a href="/pizzas/{{ $pizza['id']  }}">Ver ticket</a> </td>
                <td><form action="/pizzas/{{ $pizza['id'] }}" method="POST">
                          @csrf 
                          @method('DELETE')
                    <button>Completar Pedido</button>
                    </form></td>
                    
                </tr>
            </tbody>
            @endforeach
         </table>










    </div>



@endsection