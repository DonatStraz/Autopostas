<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(ReviewImages::class);
    }

    public function carMake(){
        return $this->belongsTo(CarMake::class, 'make_id');
    }
    public function carModel(){
        return $this->belongsTo(CarModel::class, 'model_id');
    }
    public function carGeneration(){
        return $this->belongsTo(CarGeneration::class, 'generation_id');
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    static function recommendCounts($id){
        return Review::select(\DB::raw('COUNT(*) as count'), 'recommend' , 'generation_id')
        ->having('recommend', '=', 'Taip')->having('generation_id', '=', $id)
        ->groupBy('recommend', 'generation_id')
        ->get();
    }

    static function notRecommendCounts($id){
       return Review::select(\DB::raw('COUNT(*) as count'), 'recommend', 'generation_id')
        ->having('recommend', '=', 'Ne')->having('generation_id', '=', $id)
        ->groupBy('recommend', 'generation_id')
        ->get();
    }

    static function carAverageScores($id){
       return Review::where('generation_id', '=', $id)->select(DB::raw('AVG(reliability) as reliability'), DB::raw('AVG(engines) as engines')
        ,DB::raw('AVG(interior) as interior'), DB::raw('AVG(chassis) as chassis'), DB::raw('AVG(comfort) as comfort'), DB::raw('AVG(handling) as handling')
        ,DB::raw('AVG(practicality) as practicality'),DB::raw('AVG(power_economy) as power_economy'))->get();
    }

}
