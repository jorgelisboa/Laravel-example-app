<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sheet;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->extension() == 'jpeg' or
                $image->extension() == 'jpg' or
                $image->extension() == 'png')
            {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('character_images', "$imageName", "public");

                //Inserting path in our database
                Sheet::create([
                    'char_photo_path' => $imageName,
                    'strength' => $request->strength,
                    'dexterity' => $request->dexterity,
                    'constitution' => $request->constitution,
                    'wisdom' => $request->wisdom,
                    'charisma' => $request->charisma,
                    'sheet_id'=> $request->sheet_id
                ]);

                return response()->json(['message' => "$imageName upload done"], 201);
            }
        }

        return response()->json(['message' => 'No image'], 406);
    }

    public function update(Request $request)
    {

    }
}
