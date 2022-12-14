<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Review, CarGeneration, CarMake, CarModel, ReviewImages, User};
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){

            $user = Auth::user();
            $totalReviews = User::where('id', '=', Auth::id())->withCount('reviews')->get();
            $reviews = Review::where('user_id', '=', Auth::id())->paginate(5);

            return view('profile.index')->with([
            'reviews' => $reviews,
            'user' => $user,
            'totalReviews' => $totalReviews
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($user){

            $formFields = $request->validate([
                'name' => 'required|max:20|',
                'email' => 'required|unique:users|',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->back();

        }else{

             return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id)->delete();
        return Redirect::route('/profilis');

    }
}
