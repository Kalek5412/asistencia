<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Miembro;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias=Asistencia::paginate();
        return view('asistencias.index',compact('asistencias'))
        ->with('i',(request()->input('page',1)-1)*$asistencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asistencia=new Asistencia();
        $miembros=Miembro::pluck('nombre_apellido','id');
        return view('asistencias.create',compact('asistencia','miembros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);
        $asistencia=Asistencia::create($request->all());
        return redirect()->route('asistencias.index')
        ->with('success','asistencia creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia=Asistencia::find($id);
        return view('asistencias.show',compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asistencia=Asistencia::find($id);
        return view('asistencias.edit',compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);
        $asistencia->update($request->all());
        return redirect()->route('asistencias.index')
        ->with('success','asistencia editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia=Asistencia::find($id)->delete();
        return redirect()->route('asistencias.index')
        ->with('success','Asistencia deelete');
    }
}
