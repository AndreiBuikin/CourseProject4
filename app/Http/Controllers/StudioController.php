<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ArtistCreateRequest;
use App\Http\Requests\StudioCreateRequest;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return response()->json($studios)->setStatusCode(200);
    }


    public function create(StudioCreateRequest $request)
    {
        $studio = Studio::create($request->validated());
        return response()->json($studio)->setStatusCode(201);
    }


    public function show($id)
    {
        $studio = Studio::find($id);
        if($studio){
            return response()->json($studio)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $studio = Studio::find($id);
            Studio::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
