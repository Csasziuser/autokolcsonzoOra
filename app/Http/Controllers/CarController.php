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
    public function store(Request $request){
        $request->validate([
            "modell"=>"required|string|max:255",
            "kaucio"=>"required|integer|min:0",
            "kilometerdij"=>"required|integer|min:0",
            "napidij"=>"required|integer|min:0",
            "leiras"=>"required|string|max:255"
        ]);
        Car::create([
            "car_model"=>$request->modell,
            "caution_money"=>$request->kaucio,
            "km_price"=>$request->kilometerdij,
            "day_price"=>$request->napidij,
            "description"=>$request->leiras
        ]);
    }
}
