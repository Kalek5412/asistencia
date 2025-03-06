@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>datos de asistencia </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">

                    <div class="card-body">              
                      
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha</label>
                                            <input type="date" name="fecha" class="form-control" value="{{$asistencia->fecha}}" disabled> 
                                       
                                        </div>
                                    </div>
                        
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">miembri_id</label>
                                            <input type="text" name="miembro_id" value="{{$asistencia->miembro_id}}" class="form-control" disabled>                                
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
                                 
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
