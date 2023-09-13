<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

class DrinkController extends Controller
{
    // Mostrar la lista de bebidas
    public function index()
    {
        $drinks = Drink::all();
        return response()->json(['drinks' => $drinks]);
    }

    // Crear una nueva bebida
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:drinks',
        ]);

        $drink = Drink::create($data);

        return response()->json(['message' => 'Bebida creada con éxito', 'drink' => $drink], 201);
    }

    // Mostrar los detalles de una bebida específica
    public function show(Drink $drink)
    {
        return response()->json(['drink' => $drink]);
    }

    // Actualizar los datos de una bebida
    public function update(Request $request, Drink $drink)
    {
        $data = $request->validate([
            'name' => 'string|unique:drinks,name,' . $drink->id,
        ]);

        $drink->update($data);

        return response()->json(['message' => 'Bebida actualizada con éxito', 'drink' => $drink]);
    }

    // Eliminar una bebida
    public function destroy(Drink $drink)
    {
        $drink->delete();

        return response()->json(['message' => 'Bebida eliminada con éxito']);
    }
}

