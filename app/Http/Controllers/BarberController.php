<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;

class BarberController extends Controller
{
    
    public function index()
    {
        $barbers = Barber::all();
        return response()->json(['barbers' => $barbers]);
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'branch_id' => 'required|integer',
        ]);

        $barber = Barber::create($data);

        return response()->json(['message' => 'Barbero creado con éxito', 'barber' => $barber], 201);
    }


    public function show(Barber $barber)
    {
        return response()->json(['barber' => $barber]);
    }


    public function update(Request $request, Barber $barber)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);

        $barber->update($data);

        return response()->json(['message' => 'Barbero actualizado con éxito', 'barber' => $barber]);
    }


    public function destroy(Barber $barber)
    {
        $barber->delete();

        return response()->json(['message' => 'Barbero eliminado con éxito']);
    }

    // Obtiene las citas de un barbero específico
    public function getAppointmentsByBarber(Barber $barber)
    {
        $appointments = $barber->appointments;
        return response()->json(['appointments' => $appointments]);
    }
}

