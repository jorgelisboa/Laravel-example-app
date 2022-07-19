<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

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
        // dd($request->all());
        // DB::insert('INSERT INTO character (name) VALUES (?)', [$characterName]); // pure SQL code
        Character::create($request->all()); //Passa os valores presentes no fillable da Classe Character

        to_route('character.index');
    }

    public function destroy(Request $request) {
        //dd($request->character); //Looking for parameter inside our request in our url (look at web.php)
        Character::destroy($request->character);

        //POST REDIRECT GET
        return to_route('character.index');
    }
}
