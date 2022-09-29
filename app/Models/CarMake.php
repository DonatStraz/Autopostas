<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory;
    protected $table = 'car_makes';

    protected $fillable = [
        'name',
    ];

    public function carModel(){
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function carGeneration()
    {
        return $this->hasManyThrough(CarModel::class,CarGeneration::class);
    }
}


