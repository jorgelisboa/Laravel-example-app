<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index(Request $request) {

        //Eloquent returns a collection
        $characters = Character::query()->orderBy('name')->get(); //Ascendent as default
        $successMessage = session('success.message');

        return view('theboys.index')
            ->with('characters', $characters)
            ->with('successMessage', $successMessage);
    }

    public function create() {
        return view('theboys.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        // DB::insert('INSERT INTO character (name) VALUES (?)', [$characterName]); // pure SQL code
        $character = Character::create($request->all()); //Passa os valores presentes no fillable da Classe Character
        $request->session()->flash('success.message', "'{$character->name}' added to your list"); //Only for one request

        return to_route('characters.index');
    }

    public function destroy(Request $request) {
        //dd($request->character); //Looking for parameter inside our request in our url (look at web.php)
        Character::destroy($request->character);
        //POST REDIRECT GET
        return to_route('characters.index')->with('success.message', 'Character removed'); // with() does $request->session()->flash('success.message', 'Character removed');
    }

    public function edit(Character $character)
    {
        return view('theboys.edit')->with('character', $character);
    }

    public function update(Character $character, Request $request)
    {
        $character->fill($request->all()); //Mass assignment to fill all the fields inside fill()
        $character->save();

        return to_route('characters.index')->with('success.message', "Character '$character->name' updated");
    }
}
