<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Miembro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;




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

    public function reportes()
    {

        return view('asistencias.reportes');
    }

    public function pdf()
    {

     /*    $asistencias=Asistencia::paginate();
        $pdf = Pdf::loadView('asistencias.pdf', $pdf);
        return $pdf->stream(); */
        $asistencias=Asistencia::paginate();
        $pdf = Pdf::loadView('asistencias.pdf',['asistencias'=>$asistencias]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function pdf_fechas(Request $request)
    {
        $fi=$request->fi;
        $ff=$request->ff;
        $asistencias=Asistencia::where('fecha','>=',$fi)
        ->where('fecha','<=',$ff)
        ->get();
        $pdf = Pdf::loadView('asistencias.pdf_fechas',['asistencias'=>$asistencias]);       
        return $pdf->stream();
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
