<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;


class MapController extends Controller
{

    public function map() {

        return view('map.index');

    }


    public function storeMap() {

        $map = new Map();

        $map->distancia = request('distancia');
        $map->costo = request('costo'); 
            
        $map->save();

        return redirect('/');
    
    }

}
