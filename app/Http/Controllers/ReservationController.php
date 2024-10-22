<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Lógica para calcular el precio total
        $room = Room::findOrFail($request->room_id);
        $total_price = $room->price; // Aquí puedes agregar lógica para tarifas adicionales.

        Reservation::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $total_price,
        ]);

        return redirect()->route('reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'rooms'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Validar y actualizar la reserva
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
