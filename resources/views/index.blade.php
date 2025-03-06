@extends('layouts.admin')

@section('content')
    <div class="content" style="margin: 20px">
        <h1>pagina principal</h1>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-secondary" style="height: 160px">
                    <div class="inner">
                        <?php
                            $contador_usuario=0;    
                        ?>
                        @foreach($usuarios as $usuario)
                            <?php $contador_usuario= $contador_usuario + 1; ?>
                        @endforeach
                        <h3><?=$contador_usuario;?></h3>
                        <p>usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-add"></i>
                    </div>
                <a href="{{url('usuarios')}}" class="small-box-footer" style="margin-top: 15px">mas informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>    
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-info" style="height: 160px">
                    <div class="inner">
                        <?php
                            $contador_departamento=0;    
                        ?>
                        @foreach($departamentos as $departamento)
                            <?php $contador_departamento= $contador_departamento + 1; ?>
                        @endforeach
                        <h3><?=$contador_departamento;?></h3>
                        <p>Departamentos</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-building-check"></i>
                    </div>
                <a href="{{url('departamentos.index')}}" class="small-box-footer" style="margin-top: 15px">mas informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>    
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-success" style="height: 160px">
                    <div class="inner">
                        <?php
                            $contador_miembro=0;    
                        ?>
                        @foreach($miembros as $miembro)
                            <?php $contador_miembro= $contador_miembro + 1; ?>
                        @endforeach
                        <h3><?=$contador_miembro;?></h3>
                        <p>Miembros</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-file-earmark-person"></i>
                    </div>
                <a href="{{url('miembros')}}" class="small-box-footer" style="margin-top: 15px">mas informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>    
            </div>
        </div>
    </div>
@endsection