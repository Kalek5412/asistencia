<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $miembros=Miembro::all();
        return view('miembros.index',['miembros'=>$miembros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('miembros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_apellido'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'fecha_nacimiento'=>'required',
            'email'=>'required',
            'departamento'=>'required'
        ]);
        //$miembro=request()->all(); return response()->json($miembro);
        $miembro=new Miembro();
        $miembro->nombre_apellido=$request->nombre_apellido;
        $miembro->direccion=$request->direccion;
        $miembro->telefono=$request->telefono;
        $miembro->fecha_nacimiento=$request->fecha_nacimiento;
        $miembro->genero=$request->genero;
        $miembro->email=$request->email;
        $miembro->estado='1';
        $miembro->departamento=$request->departamento;
        //$miembro->foto=$request->foto;
        $miembro->foto=$request->file('foto')->store('fotosUsers','public');
        $miembro->fecha_ingreso='2025-01-05';
        $miembro->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Miembro $miembro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Miembro $miembro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Miembro $miembro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Miembro $miembro)
    {
        //
    }
}
