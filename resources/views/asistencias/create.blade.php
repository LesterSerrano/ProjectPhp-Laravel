@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Crear Asistencia</div>

                    <div class="card-body">
                        <form action="{{ route('asistencias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="estudiante_id">Estudiante:</label>
                                <select name="estudiante_id" id="estudiante_id" class="form-control">
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grupo_id">Grupo:</label>
                                <select name="grupo_id" id="grupo_id" class="form-control">
                                    @foreach ($grupos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="hora_entrada">Hora de Entrada:</label>
                                <input type="time" name="hora_entrada" id="hora_entrada" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
