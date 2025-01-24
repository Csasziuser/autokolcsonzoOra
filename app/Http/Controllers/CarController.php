<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function getCar(){
        $autok = Car::all();
        return response()->json($autok);
    }
    public function store(){

    }
}
