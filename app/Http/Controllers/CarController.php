<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CarGeneration, CarMake, CarModel, Review};
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
    $make = request()->query('make-select');
    $model = request()->query('model-select');
    $generation = request()->query('generation-select');

    if(!empty($make) && empty($model) && empty($generation)){
     $cars = CarGeneration::with('carModels.carMakes')->get()->where('carModels.carMakes.id', '=', $make);
    }else if(!empty($make) && !empty($model) && empty($generation)){
     $cars = CarGeneration::with(['carModels','carModels.carMakes'])->get()->where('carModels.id', '=', $model)->where('carModels.carMakes.id', '=', $make);
    }else if(!empty($make) && !empty($model) && !empty($generation)){
     $cars = CarGeneration::with(['carModels','carModels.carMakes'])->get()->where('carModels.id', '=', $model)->where('carModels.carMakes.id', '=', $make)
     ->where('id', '=', $generation);
    }
    else if(empty($make) && empty($model) && empty($generation)){
     $cars = CarGeneration::with(['carModels','carModels.carMakes'])->get();
    }

        return view('cars.index')->with([
            'cars' => $cars
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function show($id)
        {
        $cars = CarGeneration::with(['carModels','carModels.carMakes'])->get()->where('id', '=', $id);

        $reviewCounts = CarGeneration::where('id', '=',  $id)->withCount('carReviews')->get();

        $recommendCounts = Review::recommendCounts($id);

        $notRecommendCounts = Review::notRecommendCounts($id);

        $carAverageScores = Review::carAverageScores($id);

        $reviews = Review::where('generation_id', '=', $id)->paginate(10);

        return view('cars.show')->with([
            'cars' => $cars,
            'reviewCounts' => $reviewCounts,
            'reviews' => $reviews,
            'recommendCounts' => $recommendCounts,
            'carAverageScores' => $carAverageScores ,
            'notRecommendCounts' => $notRecommendCounts
        ]);
    }


}
