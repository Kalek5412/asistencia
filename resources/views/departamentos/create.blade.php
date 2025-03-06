@extends('layouts.admin')
@section('content')
<div class="content" style="margin-left: 20px">
    <h1>creacion de departamento</h1>
    @foreach($errors->all as $error)
        <div class="alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
      <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">crear depa</h3>
                </div>
                <div class="card-body">              
                    <form action="{{url('/departamentos')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                   <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">nombre departamento</label>
                                            <input type="text" name="nombre_depa" class="form-control" value="{{old('nombre_depa')}}" required> 
                                            @error('nombre_depa')
                                                <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                     
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">fecha_ingreso</label>
                                            <input type="date" name="fecha_ingreso" value="{{old('fecha_ingreso')}}" class="form-control">
                                            @error('fecha_ingreso')
                                            <small style="color:red">*campo requerido</small>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">descripcion</label>
                                            <textarea  class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>                    
                                            <script>
                                                CKEDITOR.replace('descripcion');
                                            </script>
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
                                    <button type="submit" class="btn btn-primary">enviar</button>
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