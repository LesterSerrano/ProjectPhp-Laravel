@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Detalles de Asistencia</div>

                    <div class="card-body">
                        <p><strong>Estudiante:</strong> {{ $asistencia->estudiante->nombre }}</p>
                        <p><strong>Grupo:</strong> {{ $asistencia->grupo->nombre }}</p>
                        <p><strong>Fecha:</strong> {{ $asistencia->fecha }}</p>
                        <p><strong>Hora de Entrada:</strong> {{ $asistencia->hora_entrada }}</p>
                        <a href="{{ route('asistencias.index', $asistencia->id) }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
