<!-- resources/views/asistencias/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Asistencias</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Grupo</th>
                                    <th>Fecha</th>
                                    <th>Hora de Entrada</th>
                                    @auth('docente')
                                    <th>Acciones</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->estudiante->nombre }}</td>
                                        <td>{{ $asistencia->grupo->nombre }}</td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>{{ $asistencia->hora_entrada }}</td>
                                        <td>
                                            @auth('docente')
                                            <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-primary">Editar</a>
                                            <a href="{{ route('asistencias.show', $asistencia->id) }}" class="btn btn-info">Ver</a>
                                            <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>

                                            @endauth

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
