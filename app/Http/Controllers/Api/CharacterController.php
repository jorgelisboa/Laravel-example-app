<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::all();
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function store(Request $request)
    {
        return response()->json(
            Character::create($request->all()), 201
        );
    }

    public function show(Character $character)
    {
        return $character;
    }
}
