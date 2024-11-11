<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    // Muestra la lista de clasificaciones
    public function index()
    {
        $classifications = Classification::paginate(10);
        return view('classifications.index', compact('classifications'));
    }

    public function show(Classification $classification)
    {
        return view('classifications.show', compact('classification'));
    }

    // Muestra el formulario para crear una nueva clasificación
    public function create()
    {
        return view('classifications.create');
    }

    // Guarda una nueva clasificación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Classification::create($request->all());

        return redirect()->route('classifications.index')->with('success', 'Classification created successfully.');
    }

    // Muestra el formulario para editar una clasificación
    public function edit(Classification $classification)
    {
        return view('classifications.edit', compact('classification'));
    }

    // Actualiza la clasificación en la base de datos
    public function update(Request $request, Classification $classification)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $classification->update($request->all());

        return redirect()->route('classifications.index')->with('success', 'Classification updated successfully.');
    }

    // Elimina una clasificación
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect()->route('classifications.index')->with('success', 'Classification deleted successfully.');
    }
}
