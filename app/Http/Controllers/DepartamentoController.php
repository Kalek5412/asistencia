<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos=Departamento::all();
        return view('departamentos.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 /*        $departamento=request()->all();
        return response()->json($departamento); */
        $request->validate([
            'nombre_depa'=>'required',
            'fecha_ingreso'=>'required',
        ]);
        $departamento=new Departamento();
        $departamento->nombre_depa=$request->nombre_depa;
        $departamento->descripcion=$request->descripcion;
        $departamento->estado='1';
        $departamento->fecha_ingreso=$request->fecha_ingreso;
        $departamento->save();
        return redirect()->route('departamentos.index')
        ->with('mensaje', 'Se registro de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $departamento=Departamento::findOrFail($id);
        return view('departamentos.show',compact('departamento'));
        //11.30
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departamento=Departamento::findOrFail($id);
        return view('departamentos.edit',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_depa'=>'required',
            'fecha_ingreso'=>'required',
        ]);
        $departamento=Departamento::findOrFail($id);
        $departamento->nombre_depa=$request->nombre_depa;
        $departamento->descripcion=$request->descripcion;
        $departamento->fecha_ingreso=$request->fecha_ingreso;
        $departamento->save();
        return redirect()->route('departamentos.index')
        ->with('mensaje', 'Se registro de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Departamento::destroy($id);
        return redirect()->route('departamentos.index')
        ->with('mensaje', 'Se elimino de manera correcta')
        ->with('icono', 'success');
    }
}
