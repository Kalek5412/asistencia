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
        $miembros=Miembro::all()->sortByDesc('id');
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
        if($request->hasFile('foto')){
            $miembro->foto=$request->file('foto')->store('fotosUsers','public');
        }
        //$miembro->foto=$request->foto; 
        $miembro->fecha_ingreso='2025-01-05';
        $miembro->save();
        return redirect()->route('miembros.index')
        ->with('mensaje', 'Se registro de manera correcta')
        ->with('icono', 'success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $miembro=Miembro::findOrFail($id);
        //return response()->json($miembro);
        return view('miembros.show',['miembro'=>$miembro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $miembro=Miembro::findOrFail($id);
        return view('miembros.edit',['miembro'=>$miembro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_apellido'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'fecha_nacimiento'=>'required',
            'email'=>'required',
            'departamento'=>'required'
        ]);
        $miembro=Miembro::findOrFail($id);
        $miembro->nombre_apellido=$request->nombre_apellido;
        $miembro->direccion=$request->direccion;
        $miembro->telefono=$request->telefono;
        $miembro->fecha_nacimiento=$request->fecha_nacimiento;
        $miembro->genero=$request->genero;
        $miembro->email=$request->email;
       // $miembro->estado='1';
        $miembro->departamento=$request->departamento;
        if($request->hasFile('foto')){
            Storage::delete('public/'.$miembro->foto);
            $miembro->foto=$request->file('foto')->store('fotosUsers','public');
        }
        //$miembro->foto=$request->foto; 
        $miembro->fecha_ingreso='2025-01-05';
        $miembro->save();
        return redirect()->route('miembros.index')
        ->with('mensaje', 'Se actualizo de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Miembro::destroy($id);
        return redirect()->route('miembros.index')
        ->with('mensaje', 'Se elimino de manera correcta')
        ->with('icono', 'success');

    }
}
