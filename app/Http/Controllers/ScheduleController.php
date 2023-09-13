<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    // Mostrar la lista de horarios disponibles para un barbero en una fecha específica
    public function index(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
        ]);

        $barberId = $request->input('barber_id');
        $date = $request->input('date');

        // Obtener horarios disponibles para el barbero en la fecha dada
        $schedules = Schedule::where('barber_id', $barberId)
            ->where('date', $date)
            ->orderBy('time')
            ->get();

        return response()->json(['schedules' => $schedules]);
    }

    // Crear horarios disponibles para un barbero en una fecha específica
    public function store(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'times' => 'required|array',
            'times.*' => 'required|date_format:H:i',
        ]);

        $barberId = $request->input('barber_id');
        $date = $request->input('date');
        $times = $request->input('times');

        // Eliminar horarios existentes para el barbero en la fecha dada
        Schedule::where('barber_id', $barberId)
            ->where('date', $date)
            ->delete();

        // Crear nuevos horarios disponibles
        foreach ($times as $time) {
            Schedule::create([
                'barber_id' => $barberId,
                'date' => $date,
                'time' => $time,
            ]);
        }

        return response()->json(['message' => 'Horarios creados con éxito'], 201);
    }
}

