@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>listado de departamento</h1>
        @if($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                title: "Bien hecho!",
                text: "{{$message}}",
                icon: "success"
            });
        </script>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">departamentos registrados</h3>
                        <div class="card-tools">
                            <a href="{{ url('departamentos/create') }}" class="btn btn-primary">
                                <i class="bi bi-file-plus"></i>nuevo departamento
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inlin table-sm"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nombre departamento</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">estado</th>
                                    <th scope="col">fecha_ingreso</th>
        
                                    <th scope="col">accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($departamentos as $departamento)
                                    <tr>

                                        <td><?php echo $i = $i + 1; ?></td>
                                        <td>{{ $departamento->nombre_depa }}</td>
                                        <td>{!!$departamento->descripcion !!}</td>
                                        <td style="text-align:center">
                                            <button class="btn btn-success btn-sm" style="border-radius: 20px">
                                                activo
                                            </button>
                                        </td> 
                                        <td>{{ $departamento->fecha_ingreso }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                              
                                                <form action="{{url('departamentos',$departamento->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('seguro de eliminar este registro?')" class="btn btn-danger mr-2"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <a href="{{route('departamentos.edit',$departamento->id)}}" type="button" class="btn btn-warning mr-2"><i class="bi bi-pencil"></i></a>
                                                <a href="{{url('departamentos',$departamento->id)}}"  type="button" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function() {
                                $("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de TOTAL departamentos",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 departamentos",
                                        "infoFiltered": "(Filtrado de _MAX_ total departamentos)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ departamentos",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true,
                                    "lengthChange": true,
                                    "autoWidth": false,
                                    buttons: [{
                                            extend: 'collection',
                                            text: 'Reportes',
                                            orientation: 'landscape',
                                            buttons: [{
                                                text: 'Copiar',
                                                extend: 'copy',
                                            }, {
                                                extend: 'pdf'
                                            }, {
                                                extend: 'csv'
                                            }, {
                                                extend: 'excel'
                                            }, {
                                                text: 'Imprimir',
                                                extend: 'print'
                                            }]
                                        },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
