<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barber;

class BarberController extends Controller
{
    // Mostrar la lista de barberos
    public function index()
    {
        $barbers = Barber::all();
        return response()->json(['barbers' => $barbers]);
    }

    // Crear un nuevo barbero
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:barbers',
        ]);

        $barber = Barber::create($data);

        return response()->json(['message' => 'Barbero creado con éxito', 'barber' => $barber], 201);
    }

    // Mostrar los detalles de un barbero específico
    public function show(Barber $barber)
    {
        return response()->json(['barber' => $barber]);
    }

    // Actualizar los datos de un barbero
    public function update(Request $request, Barber $barber)
    {
        $data = $request->validate([
            'name' => 'string|unique:barbers,name,' . $barber->id,
        ]);

        $barber->update($data);

        return response()->json(['message' => 'Barbero actualizado con éxito', 'barber' => $barber]);
    }

    // Eliminar un barbero
    public function destroy(Barber $barber)
    {
        $barber->delete();

        return response()->json(['message' => 'Barbero eliminado con éxito']);
    }
}
