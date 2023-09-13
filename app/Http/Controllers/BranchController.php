<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();
        return response()->json(['branches' => $branches]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        $branch = Branch::create($data);

        return response()->json(['message' => 'Sucursal creada con éxito', 'branch' => $branch], 201);
    }


    public function show(Branch $branch)
    {
        return response()->json(['branch' => $branch]);
    }


    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);

        $branch->update($data);

        return response()->json(['message' => 'Sucursal actualizada con éxito', 'branch' => $branch]);
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json(['message' => 'Sucursal eliminada con éxito']);
    }


    public function getBarbersByBranch(Branch $branch)
    {
        $barbers = $branch->barbers;
        return response()->json(['barbers' => $barbers]);
    }
}


