<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;

class MusicController extends Controller
{
    // Mostrar la lista de géneros musicales
    public function index()
    {
        $music = Music::all();
        return response()->json(['music' => $music]);
    }

    // Crear un nuevo género musical
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:music',
        ]);

        $music = Music::create($data);

        return response()->json(['message' => 'Género musical creado con éxito', 'music' => $music], 201);
    }

    // Mostrar los detalles de un género musical específico
    public function show(Music $music)
    {
        return response()->json(['music' => $music]);
    }

    // Actualizar los datos de un género musical
    public function update(Request $request, Music $music)
    {
        $data = $request->validate([
            'name' => 'string|unique:music,name,' . $music->id,
        ]);

        $music->update($data);

        return response()->json(['message' => 'Género musical actualizado con éxito', 'music' => $music]);
    }

    // Eliminar un género musical
    public function destroy(Music $music)
    {
        $music->delete();

        return response()->json(['message' => 'Género musical eliminado con éxito']);
    }
}

