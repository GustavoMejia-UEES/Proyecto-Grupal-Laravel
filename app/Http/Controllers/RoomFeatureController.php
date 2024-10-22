<?php

namespace App\Http\Controllers;

use App\Models\RoomFeature;
use Illuminate\Http\Request;

class RoomFeatureController extends Controller
{
    public function index()
    {
        $features = RoomFeature::all();
        return view('room_features.index', compact('features'));
    }

    public function create()
    {
        return view('room_features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'feature' => 'required',
        ]);

        RoomFeature::create($request->all());
        return redirect()->route('room_features.index');
    }

    public function edit(RoomFeature $roomFeature)
    {
        return view('room_features.edit', compact('roomFeature'));
    }

    public function update(Request $request, RoomFeature $roomFeature)
    {
        $request->validate([
            'feature' => 'required',
        ]);

        $roomFeature->update($request->all());
        return redirect()->route('room_features.index');
    }

    public function destroy(RoomFeature $roomFeature)
    {
        $roomFeature->delete();
        return redirect()->route('room_features.index');
    }
}
