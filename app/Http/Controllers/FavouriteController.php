<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\FavouriteCreateRequest;
use App\Http\Requests\RatingCreateRequest;
use App\Models\Favourite;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = Favourite::all();
        return response()->json($favourites)->setStatusCode(200);
    }


    public function create(FavouriteCreateRequest $request)
    {
        $favourite = Favourite::create($request->validated());
        return response()->json($favourite)->setStatusCode(201);
    }


    public function show($id)
    {
        $favourite = Favourite::find($id);
        if($favourite){
            return response()->json($favourite)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $favourite = Favourite::find($id);
            Favourite::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
