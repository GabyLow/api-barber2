<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::all();
        return response()->json(['services' => $services]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $service = Service::create($data);

        return response()->json(['message' => 'Servicio creado con éxito', 'service' => $service], 201);
    }


    public function show(Service $service)
    {
        return response()->json(['service' => $service]);
    }


    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'string',
            'duration' => 'integer',
            'price' => 'numeric',
        ]);

        $service->update($data);

        return response()->json(['message' => 'Servicio actualizado con éxito', 'service' => $service]);
    }


    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Servicio eliminado con éxito']);
    }
}

