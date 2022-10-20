<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'car_models';

    protected $guarded =[];

    public function carGenerations()
    {
        return $this->hasMany(CarGeneration::class, 'generation_id');
    }

    public function carMakes(){
        return $this->belongsTo(CarMake::class, 'make_id');
    }

}
