@extends('layouts.admin')
@section('content')
<div class="content" style="margin-left: 20px">
    <h1>listado</h1>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">actualizar miemboi</h3>
                </div>
                <div class="card-body">              
                    <form action="{{url('/miembros')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">nombre y apellido</label>
                                            <input type="text" name="nombre_apellido" class="form-control" value="{{old('nombre_apellido')}}" required> 
                                            @error('nombre_apellido')
                                                <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                     
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">email</label>
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                            @error('email')
                                            <small style="color:red">*campo requerido</small>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">telefono</label>
                                            <input type="number"  name="telefono" class="form-control">
                                            @error('telefono')
                                            <small style="color:red">*campo requerido</small>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control">
                                            @error('fecha_nacimiento')
                                            <small style="color:red">*campo requerido</small>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">genero</label>
                                            <select name="genero" id="" class="form-control">
                                                <option value="MASCULINO">MASCULINO</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                            </select>
                                            @error('genero')
                                            <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">departamento</label>
                                            <input type="text" name="departamento" class="form-control">
                                            @error('departamento')
                                            <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                          
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">direccion</label>
                                            <input type="text" name="direccion" class="form-control">
                                            @error('direccion')
                                            <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                
                                    <div class="form-group">
                                        <label for="">fotografia</label>
                                        <input type="file" id="file" class="form-control" name="foto"><br>
                                        <center><output id="list"></output></center>
                                        <script>
                                            function archivo(evt){
                                                var files = evt.target.files;
                                                //obtenemos la imagen del campo "file".
                                                for (var i=0, f; f = files[i]; i++){
                                                    //solo admitimos imagenes.
                                                    if (!f.type.match('image.*')){
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function (theFile){
                                                        return function (e){
                                                            //insertamos la imagen
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result,'"width="70%" title="', escape(theFile.name),'"/>'].join('');
                                                        };
                                                    }) (f);
                                                    reader.readAsDataURL(f);
                                                }

                                            }
                                            document.getElementById('file').addEventListener('change',archivo, false);
                                        </script>
                                    </div>
                                
                            </div>
            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="" class="btn btn-secondary">cancelar</a>
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