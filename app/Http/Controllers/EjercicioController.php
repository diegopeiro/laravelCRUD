<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ejercicio = Ejercicio::all();
        return view('ejercicios.index', compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ejercicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'duracion' => 'required|integer|min:1',
            'categoria' => 'required|string|max:255',
        ]);

        Ejercicio::create($request->all());

        return redirect()->route('ejercicios.index')->with('success','Ejercicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejercicio $ejercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejercicio $ejercicio)
    {
        //
        return view('ejercicios.edit', compact('ejercicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejercicio $ejercicio)
    {
        //Hacer el UPDATE de los ejercicios cuando hacemos modificaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'duracion' => 'required|integer|min:1',
            'categoria' => 'required|string|max:255',
        ]);

        $ejercicio->update($request->all());

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejercicio $ejercicio)
    {
        //
        $ejercicio->delete();
        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio eliminado.');
    }
}
