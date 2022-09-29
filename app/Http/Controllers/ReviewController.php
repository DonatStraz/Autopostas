<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Review, CarGeneration, CarMake, CarModel, ReviewImages, User};
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $make = request()->query('make-select');
        $model = request()->query('model-select');
        $generation = request()->query('generation-select');

        if(!empty($make) && empty($model) && empty($generation)){
        $reviews = Review::where('make_id', '=', $make)->whereNotNull('title')->paginate(10);
        }else if(!empty($make) && !empty($model) && empty($generation)){
            $reviews = Review::where('make_id', '=', $make)->where('model_id', '=', $model)->paginate(10);
        }else if(!empty($make) && !empty($model) && !empty($generation)){
            $reviews = Review::where('make_id', '=', $make)->where('model_id', '=', $model)->where('generation_id', '=', $generation)->paginate(10);
        }
        else if(empty($make) && empty($model) && empty($generation)){
            $reviews = Review::whereNotNull('title')->paginate(10);
        }
            return view('reviews.index')->with([
                'reviews' => $reviews,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cars = CarMake::join('car_models', 'car_models.make_id', '=', 'car_makes.id')->join('car_generations', 'car_generations.model_id', '=', 'car_models.id')
        ->get(['car_makes.name as make','car_makes.id as make_id', 'car_models.name as model','car_models.id as model_id','car_generations.name as generation', 'car_generations.id as generation_id'])
        ->where('generation_id', '=', $id);
        $review = Review::find($id);
        $reviewCounts = CarGeneration::where('id', '=',  $id)->withCount('carReviews')->get();
        $recommendCounts = Review::recommendCounts($id);
        $notRecommendCounts = Review::notRecommendCounts($id);
        $carAverageScores = Review::carAverageScores($id);
        return view('reviews.create')->with([
            'cars' => $cars,
            'review' => $review,
            'reviewCounts' => $reviewCounts,
            'recommendCounts' => $recommendCounts,
            'notRecommendCounts' => $notRecommendCounts,
            'carAverageScores' => $carAverageScores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

           $formFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
                'make_id' => 'required',
                'model_id' => 'required',
                'generation_id' => 'required',
                'reliability' => 'required',
                'engines' => 'required',
                'interior' => 'required',
                'chassis' => 'required',
                'comfort' => 'required',
                'handling' => 'required',
                'practicality' => 'required',
                'power_economy' => 'required',
                'positives' => 'required',
                'negatives' => 'required',
                'suggestion' => 'required',
                'consumption_city' => 'required',
                'consumption_country' => 'required',
                'consumption_mixed' => 'required',
                'engine_displacement' => 'required',
                'body_type' => 'required',
                'fuel_type' => 'required',
                'recommend' => 'required',
            ]);

            if (Auth::check()) {
               $new_review = $request->user()->reviews()->create($formFields);
                if($request->has('images')){
                    if (is_array($request->file('images'))){
                    foreach($request->file('images')as $image){
                        $imageName = $formFields['title'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                        $image->move(public_path('review_images'),$imageName);
                        ReviewImages::create([
                            'review_id'=>$new_review->id,
                            'image'=>$imageName
                        ]);
                        }
                    }
                  }
              }
            return back()->with('message', ' Atsiliepimas patalpintas sėkmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $car_id )
    {
        $review = Review::find($id);
        $totalReviews = User::where('id', '=', $review->user_id)->withCount('reviews')->get();
        $reviewCounts = CarGeneration::where('id', '=',  $car_id)->withCount('carReviews')->get();
        $recommendCounts = Review::recommendCounts($car_id);
        $notRecommendCounts = Review::notRecommendCounts($car_id);
        $carAverageScores = Review::carAverageScores($car_id);
        $cars = CarGeneration::find($id);
        $images = $review->images;
        return view('reviews.show')->with([
            'review' => $review,
            'images' => $images,
            'cars' => $cars,
            'reviewCounts' => $reviewCounts,
            'recommendCounts' =>  $recommendCounts,
            'notRecommendCounts' =>  $notRecommendCounts,
            'carAverageScores' => $carAverageScores,
            'totalReviews' => $totalReviews

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
