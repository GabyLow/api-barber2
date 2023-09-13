<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Mostrar la lista de citas
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json(['appointments' => $appointments]);
    }

    // Crear una nueva cita
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_client' => 'required|exists:clients,id',
            'id_branch' => 'required|exists:branches,id',
            'id_barber' => 'required|exists:barbers,id',
            'id_service' => 'required|exists:services,id',
            'id_drink' => 'required|exists:drinks,id',
            'id_music' => 'required|exists:music,id',
            'id_date' => 'required|date',
            'id_time' => 'required|date_format:H:i',
            'id_price' => 'required|numeric',
        ]);

        $appointment = Appointment::create($data);

        return response()->json(['message' => 'Cita creada con éxito', 'appointment' => $appointment], 201);
    }

    // Mostrar los detalles de una cita específica
    public function show(Appointment $appointment)
    {
        return response()->json(['appointment' => $appointment]);
    }

    // Actualizar los datos de una cita
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'id_client' => 'exists:clients,id',
            'id_branch' => 'exists:branches,id',
            'id_barber' => 'exists:barbers,id',
            'id_service' => 'exists:services,id',
            'id_drink' => 'exists:drinks,id',
            'id_music' => 'exists:music,id',
            'id_date' => 'date',
            'id_time' => 'date_format:H:i',
            'id_price' => 'numeric',
        ]);

        $appointment->update($data);

        return response()->json(['message' => 'Cita actualizada con éxito', 'appointment' => $appointment]);
    }

    // Eliminar una cita
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json(['message' => 'Cita eliminada con éxito']);
    }
}
