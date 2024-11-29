<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ArtistCreateRequest;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return response()->json($artists)->setStatusCode(200);
    }


    public function create(ArtistCreateRequest $request)
    {
        //Путь к файлу аватар
        $path = null;

        //Сохранение аватара пользователя
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        }
        // Создание пользователя
        $artist = Artist::create([
            ...$request->validated(), 'photo' => $path
        ]);
        return response()->json($artist)->setStatusCode(201);
    }


    public function show($id)
    {
        $artist = Artist::find($id);
        if($artist){
            return response()->json($artist)->setStatusCode(200);
        }else{
            throw new ApiException('Увы, ничего не найдено :(', 404);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if($user->role->code === 'admin'){
            $artist = Artist::find($id);
            Artist::destroy($id);
            return response()->json()->setStatusCode(200);
        }
        throw new ApiException('У вас нет прав :(', 403);
    }
}
