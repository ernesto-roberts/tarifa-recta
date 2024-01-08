@extends('layouts.layout')
        

@section('content')


<div class="flex justify-center mt-6">
                   
    <div class="content">

        <div class="title m-b-md">

         <h1>Pedido para {{ $pizza->cliente }}</h1>



         <p>{{ $pizza->tipo }}</p>
         <p>{{ $pizza->precio }}</p>

         <br />
         <br />

         <form action="/pizzas/{{ $pizza->id }}" method="POST">

         @csrf 
         @method('DELETE')
         <button>Completar Pedido</button>
         </form>

         <a href="/pizzas"><-volver</a>

</div>

    </div>

</div>

@endsection