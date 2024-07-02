@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Asistencia</div>

                <div class="card-body">
                    <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="estudiante_id">Estudiante:</label>
                            <input type="text" id="estudiante_id" name="estudiante_id" value="{{ $estudiante->nombre }} {{ $estudiante->apellido }}" class="form-control" disabled>
                            <input type="hidden" name="estudiante_id" value="{{ $estudiante->id }}">
                        </div>

                        <div class="form-group">
                            <label for="grupo_id">Grupo:</label>
                            <select name="grupo_id" id="grupo_id" class="form-control @error('grupo_id') is-invalid @enderror" disabled>
                                <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                            </select>
                            @error('grupo_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $asistencia->fecha) }}">
                            @error('fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hora_entrada">Hora de Entrada:</label>
                            <input type="time" name="hora_entrada" id="hora_entrada" class="form-control @error('hora_entrada') is-invalid @enderror" value="{{ old('hora_entrada', $asistencia->hora_entrada) }}">
                            @error('hora_entrada')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
