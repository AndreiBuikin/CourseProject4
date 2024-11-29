<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AgeRatingRequest;
use App\Http\Requests\SongCreateRequest;
use App\Models\AgeRating;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgeRatingController extends Controller
{
    public function index()
    {
        $ageratings = AgeRating::all();
        return response()->json($ageratings)->setStatusCode(200);
    }


    public function create(AgeRatingRequest $request)
    {
        $agerating = AgeRating::create($request->validated());
        return response()->json($agerating)->setStatusCode(201);
    }


    public function show($id)
    {
        $agerating = AgeRating::find($id);
        if($agerating){
            return response()->json($agerating)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }
}
