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
                        <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-primary">Editar</a>

                        <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
