<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\RatingCreateRequest;
use App\Http\Requests\SongCreateRequest;
use App\Models\Rating;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return response()->json($ratings)->setStatusCode(200);
    }


    public function create(RatingCreateRequest $request)
    {
        $rating = Rating::create($request->validated());
        return response()->json($rating)->setStatusCode(201);
    }


    public function show($id)
    {
        $rating = Rating::find($id);
        if($rating){
            return response()->json($rating)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $rating = Rating::find($id);
            Rating::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
