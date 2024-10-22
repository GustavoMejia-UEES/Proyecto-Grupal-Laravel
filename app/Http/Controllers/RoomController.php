<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }
    public function adminIndex()
{

    $rooms = Room::all(); // Obtener todas las habitaciones
    return view('rooms.admin.index', compact('rooms'));


     
}

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|string',
        'descripcion' => 'nullable|string',
        'numero' => 'required|integer|unique:rooms',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'precio' => 'required|numeric',
    ]);

    // Guarda la foto
    $fotoPath = $request->file('foto')->store('room_photos');

    // Crea la habitación
    Room::create([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'descripcion' => $request->descripcion,
        'numero' => $request->numero,
        'foto' => $fotoPath,
        'precio' => $request->precio,
    ]);

    return redirect()->route('rooms.admin.index')->with('success', 'Habitación creada exitosamente.');
}










    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required|unique:rooms,number,' . $room->id,
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
