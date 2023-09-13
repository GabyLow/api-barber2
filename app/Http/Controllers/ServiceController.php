<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    // Mostrar la lista de servicios
    public function index()
    {
        $services = Service::all();
        return response()->json(['services' => $services]);
    }

    // Crear un nuevo servicio
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:services',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $service = Service::create($data);

        return response()->json(['message' => 'Servicio creado con éxito', 'service' => $service], 201);
    }

    // Mostrar los detalles de un servicio específico
    public function show(Service $service)
    {
        return response()->json(['service' => $service]);
    }

    // Actualizar los datos de un servicio
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'string|unique:services,name,' . $service->id,
            'duration' => 'integer',
            'price' => 'numeric',
        ]);

        $service->update($data);

        return response()->json(['message' => 'Servicio actualizado con éxito', 'service' => $service]);
    }

    // Eliminar un servicio
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Servicio eliminado con éxito']);
    }
}

