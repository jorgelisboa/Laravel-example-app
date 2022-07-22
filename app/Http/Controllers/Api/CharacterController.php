<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::with('sheets')->get();
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function store(Request $request)
    {
        $imagePath = $request->file()
            ->store('characters_images', 'public');

        dd($imagePath);

        return response()->json(
            Character::create($request->all()), 201
        ); //You can specify that it's a json (laravel tries to parse, so, better prevent) and pass a http status after response
    }

    public function show(int $character) // REMEMBER: See which endpoint is it using route:list
    {
        return Character::whereId($character)
            ->with('sheets')
            ->first(); //If our table relationship was "hasMany" it would be an array of objects
    }
}
