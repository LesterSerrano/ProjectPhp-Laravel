@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1>Lista de grupos</h1>
    <form action="{{ route('grupos.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('grupos.create') }}" class="btn btn-secondary">Ir a crear</a>
            </div>
        </div>
    </form>



    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>
                        <a href="{{ route('grupos.edit', $item->id) }}" class="btn btn-success">Editar</a>
                        <a href="{{ route('grupos.show', $item->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('grupos.delete', $item->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            {{ $grupos->links() }}
        </div>
    </div>
@endsection
