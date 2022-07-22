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

    public function store(Request $request)
    {
        /*
         * $imagePath = $request->file()
            ->store('characters_images', 'public');

        dd($imagePath);
        */

        return response()->json(
            Character::create($request->all()), 201
        ); //You can specify that it's a json (laravel tries to parse, so, better prevent) and pass a http status after response
    }

    public function show(int $character) // REMEMBER: See which endpoint is it using route:list
    {
        if (Character::find($character) == null) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        return Character::whereId($character)
            ->with('sheets')
            ->first(); //If our table relationship was "hasMany" it would be an array of objects
    }

    public function update(Character $character, Request $request)
    {
        $character->fill($request->all());
        $character->save();

        return $character;
    }

    public function destroy(int $character)
    {
        Character::destroy($character); //Delete this id line, instead of going to our db, finding it and delete
        return response()->noContent();
    }
}
