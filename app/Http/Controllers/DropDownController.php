<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{CarGeneration, CarMake, CarModel};


class DropdownController extends Controller
{
    public function fetchModels(Request $request)
    {
        $data['models'] = CarModel::where("make_id",$request->make_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchGenerations(Request $request)
    {
        $data['generations'] = CarGeneration::where("model_id",$request->model_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
