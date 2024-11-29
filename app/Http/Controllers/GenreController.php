<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ArtistCreateRequest;
use App\Http\Requests\GenreCreateRequest;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres)->setStatusCode(200);
    }


    public function create(GenreCreateRequest $request)
    {

        $genre = Genre::create($request->validated());
        return response()->json($genre)->setStatusCode(201);
    }


    public function show($id)
    {
        $genre = Genre::find($id);
        if($genre){
            return response()->json($genre)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $genre = Genre::find($id);
            Genre::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
