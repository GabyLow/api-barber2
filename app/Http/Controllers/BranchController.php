<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{
    // Mostrar la lista de sucursales
    public function index()
    {
        $branches = Branch::all();
        return response()->json(['branches' => $branches]);
    }

    // Crear una nueva sucursal
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:branches',
        ]);

        $branch = Branch::create($data);

        return response()->json(['message' => 'Sucursal creada con éxito', 'branch' => $branch], 201);
    }

    // Mostrar los detalles de una sucursal específica
    public function show(Branch $branch)
    {
        return response()->json(['branch' => $branch]);
    }

    // Actualizar los datos de una sucursal
    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'name' => 'string|unique:branches,name,' . $branch->id,
        ]);

        $branch->update($data);

        return response()->json(['message' => 'Sucursal actualizada con éxito', 'branch' => $branch]);
    }

    // Eliminar una sucursal
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json(['message' => 'Sucursal eliminada con éxito']);
    }
}


