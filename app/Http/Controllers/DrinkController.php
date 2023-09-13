<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class DrinkController extends Controller
{

    public function index()
    {
        $drinks = Drink::all();
        return response()->json(['drinks' => $drinks]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $drink = Drink::create($data);

        return response()->json(['message' => 'Bebida creada con éxito', 'drink' => $drink], 201);
    }


    public function show(Drink $drink)
    {
        return response()->json(['drink' => $drink]);
    }


    public function update(Request $request, Drink $drink)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);

        $drink->update($data);

        return response()->json(['message' => 'Bebida actualizada con éxito', 'drink' => $drink]);
    }


    public function destroy(Drink $drink)
    {
        $drink->delete();

        return response()->json(['message' => 'Bebida eliminada con éxito']);
    }
}


