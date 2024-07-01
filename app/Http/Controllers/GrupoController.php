<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /* Acción que muestra la página principal para administrar grupos */
    public function index(Request $request)
    {
        $query = Grupo::query();

        if($request->has('nombre')){
            $query-> where('nombre','like','%' . $request->nombre . '%');

        }

        $grupos = $query->orderBy('id','desc')->simplePaginate(10);
        return view('grupos.index',compact('grupos'));
    }

    /* Acción que muestra el formulario para crear un nuevo grupo */
    public function create()
    {
        return view('grupos.create');
    }

    /* Acción que recibe los datos del formulario y los envia a la bd */
    public function store(Request $request)
    {
        $grupo = Grupo::create($request->all());
        return redirect()->route('grupos.index')->with('success', 'Grupo creado correctamente');
    }

    /* Acción que permite mostrar el detalle de un grupo  */
    public function show($id)
    {
        $grupo = Grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        return view ('grupos.show', compact('grupo'));
    }

    /* Acción que muestra los detalles de un grupo para modificar    */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        return view('grupos.edit', compact('grupo'));
    }

    /* Acción que recibe los datos modificados y los envia a la bd    */
    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        $grupo->nombre = $request->nombre;
        $grupo->descripcion = $request->descripcion;

        $grupo->save();

        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente');
    }

    public function delete($id)
    {
        $grupo = Grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        return view('grupos.delete', compact('grupo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        if(!$grupo){
            return abort(404);
        }

        $grupo->delete();
        return redirect()->route('grupos.index')->with('success', 'Grupo elimiado correctamente');
    }
}
