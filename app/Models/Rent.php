<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Rent extends Model
{
    protected $fillable =['email','car_id','rent_start','rent_end','km','all_price'];

    public function car(){
        return $this->belongsTo(Car::class);
    } 
}
