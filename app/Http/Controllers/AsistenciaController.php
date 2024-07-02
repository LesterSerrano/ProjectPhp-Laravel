<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencia::all();
        return view('asistencias.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();
        return view('asistencias.create', compact('estudiantes', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiante,id',
            'grupo_id' => 'required|exists:grupo,id',
            'fecha' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
        ]);

        Asistencia::create($request->all());
        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $grupos = Grupo::all();
        $estudiantes = Estudiante::all();

        return view('asistencias.edit', compact('asistencia', 'grupos', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiante,id',
            'grupo_id' => 'required|exists:grupo,id',
            'fecha' => 'nullable|date',
            'hora_entrada' => 'nullable|date_format:H:i',
        ]);

        $asistencia = Asistencia::findOrFail($id);
        $asistencia->fill($request->all())->save();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
