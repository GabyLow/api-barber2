<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class MusicController extends Controller
{

    public function index()
    {
        $music = Music::all();
        return response()->json(['music' => $music]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $music = Music::create($data);

        return response()->json(['message' => 'Opción de música creada con éxito', 'music' => $music], 201);
    }


    public function show(Music $music)
    {
        return response()->json(['music' => $music]);
    }


    public function update(Request $request, Music $music)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);

        $music->update($data);

        return response()->json(['message' => 'Opción de música actualizada con éxito', 'music' => $music]);
    }


    public function destroy(Music $music)
    {
        $music->delete();

        return response()->json(['message' => 'Opción de música eliminada con éxito']);
    }
}


