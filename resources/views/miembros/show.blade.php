@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>datos de miembro -> {{ $miembro->nombre_apellido }}</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">nombre y apellido</label>
                                            <input type="text" name="nombre_apellido"
                                                value="{{ $miembro->nombre_apellido }}" class="form-control" disabled>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">email</label>
                                            <input type="email" name="email" value="{{ $miembro->email }}"
                                                class="form-control" disabled>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">telefono</label>
                                            <input type="number" name="telefono" value="{{ $miembro->telefono }}"
                                                class="form-control" disabled>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha nacimiento</label>
                                            <input type="date" name="fecha_nacimiento"
                                                value="{{ $miembro->fecha_nacimiento }}" class="form-control" disabled>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">genero</label>
                                            <select name="genero" id="" class="form-control" disabled>
                                                @if ($miembro->genero == 'MASCULINO')
                                                    <option value="MASCULINO">MASCULINO</option>
                                                    <option value="FEMENINO">FEMENINO</option>
                                                @else
                                                    <option value="FEMENINO">FEMENINO</option>
                                                    <option value="MASCULINO">MASCULINO</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">departamento</label>
                                            <input type="text" name="departamento" value="{{ $miembro->departamento }}"
                                                class="form-control" disabled>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">direccion</label>
                                            <input type="text" name="direccion" value="{{ $miembro->direccion }}"
                                                class="form-control" disabled>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="">fotografia</label>
                                    @if($miembro->foto=='')
                                        @if ($miembro->genero == 'MASCULINO')
                                            <center>
                                            <img src="{{ url('images/image-h.png') }}" alt="" width="70%"
                                            height="70%">
                                            </center>
                                        @else
                                            <center>
                                            <img src="{{ url('images/image-m.png') }}" alt="" width="70%"
                                            height="70%">
                                            </center>
                                        @endif
                                    @else
                                    <center>
                                        <img src="{{ asset('storage') . '/' . $miembro->foto }}" alt="" width="70%"
                                            height="70%">
                                    </center>
                                    @endif
                                 
                                </div>

                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{ url('miembros') }}" class="btn btn-secondary">regresar</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
