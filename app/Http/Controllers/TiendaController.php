<?php

namespace App\Http\Controllers;

use App\Models\tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $tiendas = Tienda::all();
        return view('tiendas.index', compact('tiendas'));
    }

    public function create()
    {
        return view('tiendas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required|in:restaurante,farmacia,supermercado',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:tiendas,email',
        ]);

        $tienda = Tienda::create($request->all());

        // Crear entradas específicas según el tipo
        switch ($tienda->tipo) {
            case 'restaurante':
                $tienda->restaurante()->create([
                    'tipo_cocina' => $request->tipo_cocina,
                    'horario_apertura' => $request->horario_apertura,
                    'horario_cierre' => $request->horario_cierre,
                ]);
                break;
            case 'farmacia':
                $tienda->farmacia()->create([
                    'licencia' => $request->licencia,
                    'hora_apertura' => $request->hora_apertura,
                    'hora_cierre' => $request->hora_cierre,
                ]);
                break;
            case 'supermercado':
                $tienda->supermercado()->create([
                    'secciones' => $request->secciones,
                    'promociones' => $request->promociones,
                ]);
                break;
        }

        return redirect()->route('tiendas.index')->with('success', 'Tienda creada exitosamente.');
    }


    public function show(Tienda $tienda)
    {
        return view('tiendas.show', compact('tienda'));
    }


    public function edit(Tienda $tienda)
    {
        return view('tiendas.edit', compact('tienda'));
    }


    public function update(Request $request, Tienda $tienda)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required|in:restaurante,farmacia,supermercado',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:tiendas,email,' . $tienda->id_tienda . ',id_tienda',
        ]);

        $tienda->update($request->all());

        // Actualizar entradas específicas según el tipo
        switch ($tienda->tipo) {
            case 'restaurante':
                $tienda->restaurante()->update([
                    'tipo_cocina' => $request->tipo_cocina,
                    'horario_apertura' => $request->horario_apertura,
                    'horario_cierre' => $request->horario_cierre,
                ]);
                break;
            case 'farmacia':
                $tienda->farmacia()->update([
                    'licencia' => $request->licencia,
                    'hora_apertura' => $request->hora_apertura,
                    'hora_cierre' => $request->hora_cierre,
                ]);
                break;
            case 'supermercado':
                $tienda->supermercado()->update([
                    'secciones' => $request->secciones,
                    'promociones' => $request->promociones,
                ]);
                break;
        }

        return redirect()->route('tiendas.index')->with('success', 'Tienda actualizada exitosamente.');
    }

    
    public function destroy(Tienda $tienda)
    {
        $tienda->delete();
        return redirect()->route('tiendas.index')->with('success', 'Tienda eliminada exitosamente.');
    }
}
