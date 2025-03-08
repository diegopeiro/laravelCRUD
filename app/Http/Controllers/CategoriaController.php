<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        //Envio los datos a la vista ejercicios.index de una manera limpia
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Devuelvo la vista ejercicios.create.blade
        return view('categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:50',
            'musculos_trabaja' => 'nullable|string|max:50',
            'nivel_fatiga' => 'required|integer|min:1',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success','Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //Vista blade categorias/edit.blade.php
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //Modificaciones categorias
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:50',
            'musculos_trabaja' => 'nullable|string|max:50',
            'nivel_fatiga' => 'required|integer|min:1',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //Eliminar
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada.');
    }
}
