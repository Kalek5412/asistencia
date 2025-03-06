@extends('layouts.admin')
@section('content')
<div class="content" style="margin-left: 20px">
    <h1>listado de usuarios</h1>
    @foreach($errors->all as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
      <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">llene datos de forma correcta</h3>
                </div>
                <div class="card">
                    <div class="card-body">    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Datos:</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" value="{{ $usuario->name }}" disabled>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$usuario->email}}" disabled>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="fecha_ingreso" class="col-md-4 col-form-label text-md-end">Fecha ingreso:</label>
    
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="fecha_ingreso" value="{{$usuario->fecha_ingreso}}" disabled>
    
                                </div>
                            </div>
    
                            {{-- <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">Estado:</label>
    
                                <div class="col-md-6">
                                    <input id="" type="text" class="form-control" name="estado" value="{{$usuario->estado}}" disabled>
                                </div>
                            </div> --}}
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ url('usuarios') }}" class="btn btn-secondary">volver</a>
                                </div>
                            </div>                     
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
@endsection