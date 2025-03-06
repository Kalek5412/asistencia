@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>departamento -> {{ $departamento->nombre_depa }}</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-body">              
                  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">nombre departamento</label>
                                                <input type="text" name="nombre_depa" class="form-control" value="{{$departamento->nombre_depa}}" disabled> 
                                            </div>
                                        </div>
                         
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">fecha_ingreso</label>
                                                <input type="date" name="fecha_ingreso" value="{{$departamento->fecha_ingreso}}" class="form-control" disabled>
                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">descripcion</label>
                                                <p>{!!$departamento->descripcion!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>         
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{ url('departamentos') }}" class="btn btn-secondary">cancelar</a>
                                        
                                    </div>
                                </div>
                            </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
