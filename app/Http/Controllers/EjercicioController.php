<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Categoria;
use Illuminate\Http\Request;


/**
 * Cuando llamas a view('ejercicios.create'), 
 * Laravel automáticamente busca dentro de la carpeta resources/views/
 * y asume que es un archivo .blade.php. En mi caso busca en la carpeta ejercicios por eso 
 * todos los return view son 'ejercicios.xxx'
 */
class EjercicioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * 
     * Muestro la lista de ejercicios en la vista index.blade.php
     */
    public function index()
    {
        //
        $ejercicios = Ejercicio::all();
        //Envio los datos a la vista ejercicios.index de una manera limpia
        return view('ejercicios.index', compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * Muestro el formulario para agregar un nuevo ejercicio
     */
    public function create()
    {
        
        //Devuelvo la vista ejercicios.create.blade
        $categorias = Categoria::all();  
        return view('ejercicios.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Guarda el nuevo ejercicio en la base de datos.
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
     * 
     * Muestra el formulario para editar un ejercicio existente.
     */
    public function edit($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $categorias = Categoria::all();  // Recupera todas las categorías
        return view('ejercicios.edit', compact('ejercicio', 'categorias'));
    }
    /**
     * Update the specified resource in storage.
     * 
     * Actualiza un ejercicio en la base de datos.
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
     * 
     * Elimina un ejercicio de la base de datos.
     */
    public function destroy(Ejercicio $ejercicio)
    {
        //Elimina el ejercicio
        $ejercicio->delete();
        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio eliminado.');
    }
}
