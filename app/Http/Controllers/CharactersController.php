<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CharactersController extends Controller
{
    public function index() {

        //Eloquent returns a collection
        $characters = Character::query()->orderBy('name')->get(); //Ascendent as default

        return view('theboys.index')->with('characters', $characters);
    }

    public function create() {
        return view('theboys.create');
    }

    public function store(Request $request) {
        $characterName = $request->input('name');

        // DB::insert('INSERT INTO character (name) VALUES (?)', [$characterName]); // pure SQL code
        $character = new Character();
        $character->name = $characterName;
        $character->save();

        return redirect('/character');
    }
}
