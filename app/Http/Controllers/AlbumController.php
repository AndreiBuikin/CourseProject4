<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AlbumRequest;
use App\Http\Requests\StudioCreateRequest;
use App\Models\Album;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums)->setStatusCode(200);
    }


    public function create(AlbumRequest $request)
    {
        $album = Album::create($request->validated());
        return response()->json($album)->setStatusCode(201);
    }


    public function show($id)
    {
        $album = Album::find($id);
        if($album){
            return response()->json($album)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $album = Album::find($id);
            Album::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
