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
        $cars = CarMake::join('car_models', 'car_models.make_id', '=', 'car_makes.id')->join('car_generations', 'car_generations.model_id', '=', 'car_models.id')
        ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id'])->where('make_id', '=', $make);
        }else if(!empty($make) && !empty($model) && empty($generation)){
            $cars = CarMake::join('car_models', 'car_models.make_id', '=', 'car_makes.id')->join('car_generations', 'car_generations.model_id', '=', 'car_models.id')
            ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id'])->where('make_id', '=', $make)
            ->where('model_id', '=', $model);
        }else if(!empty($make) && !empty($model) && !empty($generation)){
            $cars = CarMake::join('car_models', 'car_models.make_id', '=', 'car_makes.id')->join('car_generations', 'car_generations.model_id', '=', 'car_models.id')
            ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id'])->where('make_id', '=', $make)
            ->where('model_id', '=', $model)->where('generation_id', '=', $generation);
        }
        else if(empty($make) && empty($model) && empty($generation)){
            $cars = CarMake::join('car_models', 'car_models.make_id', '=', 'car_makes.id')->join('car_generations', 'car_generations.model_id', '=', 'car_models.id')
            ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id']);
        }

          return view('cars.index')->with([
              'cars' => $cars,
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
        $cars = CarGeneration::join('car_models', 'car_models.id', '=', 'car_generations.model_id')->join('car_makes', 'car_makes.id', '=', 'car_models.make_id')
        ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id'])
        ->where('generation_id', '=', $id);

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
