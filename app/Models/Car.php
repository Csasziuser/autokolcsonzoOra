<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rent;
class Car extends Model
{
    protected $fillable = ["car_model","caution_money","km_price","day_price","description"];

    public function rents(){
        return $this->hasMany(Rent::class);
    } 
}
