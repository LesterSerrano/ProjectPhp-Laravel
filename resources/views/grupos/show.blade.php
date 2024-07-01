@extends('layouts.app')

@section('content')
    <h1>Detalles del grupo</h1>

    <div class="row">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" disabled value="{{ $grupo->nombre }}">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" disabled> {{ $grupo->descripcion }} </textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
