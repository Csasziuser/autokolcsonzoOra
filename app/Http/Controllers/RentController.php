<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    public function getRents(){
        $kolcsonzesek = Rent::all()->load('car');
        return response()->json($kolcsonzesek);
    }

    public function store(Request $request){
        $request->validate([
            "car_id" => "required",
            "email" => "required|email",
            "kezdet" => "required|date",
            "vege" => "required|date|after_or_equal:kezdet"
        ]);

        Rent::create([
            "email"=>$request->email,
            "car_id"=>$request->car_id,
            "rent_start"=>$request->kezdet,
            "rent_end"=>$request->vege,
            "km"=>50,
            "all_price"=>10000

        ]);





}
}
