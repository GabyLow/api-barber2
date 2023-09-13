<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(['schedules' => $schedules]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'time' => 'required|time',
        ]);

        // Verificar si el horario ya está ocupado
        $isOccupied = Schedule::where('barber_id', $data['barber_id'])
            ->where('date', $data['date'])
            ->where('time', $data['time'])
            ->exists();

        if ($isOccupied) {
            return response()->json(['message' => 'Este horario ya está ocupado'], 409);
        }

        $schedule = Schedule::create($data);

        return response()->json(['message' => 'Horario creado con éxito', 'schedule' => $schedule], 201);
    }

    // Mostrar los detalles de un horario específico
    public function show(Schedule $schedule)
    {
        return response()->json(['schedule' => $schedule]);
    }

    // Actualizar los datos de un horario
    public function update(Request $request, Schedule $schedule)
    {
        $data = $request->validate([
            'barber_id' => 'exists:barbers,id',
            'date' => 'date',
            'time' => 'time',
        ]);

        // Verificar si el nuevo horario está ocupado
        if (isset($data['barber_id']) && isset($data['date']) && isset($data['time'])) {
            $isOccupied = Schedule::where('barber_id', $data['barber_id'])
                ->where('date', $data['date'])
                ->where('time', $data['time'])
                ->exists();

            if ($isOccupied) {
                return response()->json(['message' => 'Este horario ya está ocupado'], 409);
            }
        }

        $schedule->update($data);

        return response()->json(['message' => 'Horario actualizado con éxito', 'schedule' => $schedule]);
    }

    // Eliminar un horario
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return response()->json(['message' => 'Horario eliminado con éxito']);
    }

    public function checkAvailability($barber_id, $date, $time)
{
    // Verificar si el horario ya está ocupado
    $isOccupied = Schedule::where('barber_id', $barber_id)
        ->where('date', $date)
        ->where('time', $time)
        ->exists();

    if ($isOccupied) {
        return response()->json(['available' => false]);
    }

    return response()->json(['available' => true]);
}
}


