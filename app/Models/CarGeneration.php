<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGeneration extends Model
{
    use HasFactory;
    protected $table = 'car_generations';

    protected $guarded =[];

    public function carReviews(){
        return $this->hasMany(Review::class, 'generation_id');
    }

    public function carModels(){
        return $this->belongsTo(CarModel::class, 'model_id');
    }

}
