<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AlbumRequest;
use App\Http\Requests\SongCreateRequest;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return response()->json($songs)->setStatusCode(200);
    }


    public function create(SongCreateRequest $request)
    {
        $song = Song::create($request->validated());
        return response()->json($song)->setStatusCode(201);
    }


    public function show($id)
    {
        $song = Song::find($id);
        if($song){
            return response()->json($song)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $song = Song::find($id);
            Song::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
