<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory;
    protected $table = 'car_makes';

    protected $guarded =[];

    public function carModels(){
        return $this->hasMany(CarModel::class, 'id');
    }

    public function generations()
    {
        return $this->hasManyThrough(
            CarGeneration::class,
            CarModel::class,
            'make_id',
            'model_id',
            'id',
            'id'
        );
    }
}


