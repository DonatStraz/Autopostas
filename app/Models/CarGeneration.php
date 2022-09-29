<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGeneration extends Model
{
    use HasFactory;
    protected $table = 'car_generations';

    public function carReviews(){
        return $this->hasMany(Review::class, 'generation_id');

    }

    public function carMake(){
        return $this->belongsToMany(CarMake::class, CarModel::class);
    }



    public function carModel(){
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function car()
    {
        return $this->hasManyThrough(CarMake::class,CarModel::class);
    }

}
