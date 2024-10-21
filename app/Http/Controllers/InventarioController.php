<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Tienda;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with(['tienda', 'producto'])->get();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        $tiendas = Tienda::all();
        $productos = Producto::all();
        return view('inventarios.create', compact('tiendas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tienda' => 'required|exists:tiendas,id_tienda',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:0',
        ]);

        Inventario::create([
            'id_tienda' => $request->id_tienda,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'fecha_actualizacion' => now(),
        ]);

        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente.');
    }

    public function show(Inventario $inventario)
    {
        return view('inventarios.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $tiendas = Tienda::all();
        $productos = Producto::all();
        return view('inventarios.edit', compact('inventario', 'tiendas', 'productos'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'id_tienda' => 'required|exists:tiendas,id_tienda',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:0',
        ]);

        $inventario->update([
            'id_tienda' => $request->id_tienda,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'fecha_actualizacion' => now(),
        ]);

        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente.');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente.');
    }
}
