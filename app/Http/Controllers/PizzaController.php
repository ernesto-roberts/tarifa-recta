<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function map() {


        return view('pizzas.map');

    }


    public function index() {

        $pizzas = Pizza::all();

        return view('pizzas.index', ['pizzas' => $pizzas ]);

    }


    public function show($id) {

        $pizza = Pizza::findOrFail($id);
      
          return view('pizzas.show', ['pizza' => $pizza]);
      
    }


    public function create() {

        return view('pizzas.create' );
    
    }



    public function store() {

        $pizza = new Pizza();

        $pizza->cliente = request('cliente');
        $pizza->tipo = request('tipo');
        $pizza->precio = request('precio');

        $pizza->save();

        return redirect('/pizzas');
    
    }


    public function destroy($id) {
       $pizza = Pizza::findOrFail($id);
       $pizza->delete();

       return redirect('/pizzas');
    }


}
