@extends('layouts.app')

@section('content')
<h1>Actualizar grupo</h1>
<form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $grupo->nombre}}">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Descripción</label>
           <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"> {{$grupo->descripcion}} </textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="{{ route('grupos.index') }} " class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>

@endsection
