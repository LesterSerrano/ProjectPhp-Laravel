@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar asistencia del día</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información del Estudiante</h5>
                <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
                <p><strong>Apellido:</strong> {{ $estudiante->apellido }}</p>
                <p><strong>Grupo:</strong> {{ $estudianteGrupo->grupo->nombre }}</p>
            </div>
        </div>
        <br>
        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf
            <input type="hidden" name="grupo_id" value="{{ $estudianteGrupo->grupo->id }}">
            <button type="submit" class="btn btn-success">Marcar Asistencia</button>
        </form>
    </div>
@endsection
