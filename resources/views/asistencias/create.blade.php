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
                    <form action="{{url('/asistencias')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">nombre y apellido</label>
                                            <input type="date" name="fecha" class="form-control" value="{{old('fecha')}}" required> 
                                            @error('fecha')
                                                <small style="color:red">*campo requerido</small>
                                            @enderror
                                        </div>
                                    </div>
                     
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Miembro</label>
                                            <select name="miembro_id" id="miembro_id" class="form-control">
                                                @foreach($miembros as $id => $nombre)
                                                    <option value="{{ $id }}" {{ $asistencia->miembro_id == $id ? 'selected' : '' }}>
                                                        {{ $nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('miembro_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>
                                    </div>

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