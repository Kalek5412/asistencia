@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>listado</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">editar asistencia</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/asistencias',$asistencia->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">fecha</label>
                                                <input type="date" name="fecha" class="form-control" value="{{$asistencia->fecha}}" required> 
                                                @error('fecha')
                                                    <small style="color:red">*campo requerido</small>
                                                @enderror
                                            </div>
                                        </div>
                         
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">miembri_id</label>
                                                <input type="text" name="miembro_id" value="{{$asistencia->miembro_id}}" class="form-control" required>                                
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                       
                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{url('asistencias')}}" class="btn btn-secondary">cancelar</a>
                                        <button type="submit" class="btn btn-success">enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
