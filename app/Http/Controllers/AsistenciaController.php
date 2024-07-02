<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\EstudianteGrupo;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $estudiante = Auth::guard('estudiante')->user();
        $estudianteGrupo = EstudianteGrupo::where('estudiante_id', $estudiante->id)->firstOrFail();
        return view('asistencias.create', compact('estudiante', 'estudianteGrupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grupo_id' => 'required|exists:grupo,id',
        ]);

        $estudiante = Auth::guard('estudiante')->user();


        Asistencia::create([
            'estudiante_id' => $estudiante->id,
            'grupo_id' => $request->input('grupo_id'),
            'fecha' => now()->toDateString(),
            'hora_entrada' => now()->toTimeString(),
        ]);

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
        $estudiante = $asistencia->estudiante;
        $grupo = $asistencia->grupo;

        return view('asistencias.edit', compact('asistencia', 'estudiante', 'grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo_id' => 'nullable|exists:grupo,id',
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
