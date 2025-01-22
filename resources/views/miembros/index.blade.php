@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>listado</h1>
        @if($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{$message}}",
                icon: "success"
            });
        </script>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">miebros registrados</h3>
                        <div class="card-tools">
                            <a href="{{ url('miembros/create') }}" class="btn btn-primary">
                                <i class="bi bi-file-plus"></i> Agregar nuevo miembro
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inlin table-sm"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nombre y apellido</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">email</th>
                                    <th scope="col">estado</th>
                                    <th scope="col">agregado</th>
                                    <th scope="col">accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($miembros as $miembro)
                                    <tr>

                                        <td><?php echo $i = $i + 1; ?></td>
                                        <td>{{ $miembro->nombre_apellido }}</td>
                                        <td>{{ $miembro->telefono }}</td>
                                        <td>{{ $miembro->email }}</td>
                                        <td>{{ $miembro->estado }}</td>
                                        <td>{{ $miembro->fecha_ingreso }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                              
                                                <form action="{{url('miembros',$miembro->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mr-2"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <a href="{{route('miembros.edit',$miembro->id)}}" type="button" class="btn btn-warning mr-2"><i class="bi bi-pencil"></i></a>
                                                <a href="{{url('miembros',$miembro->id)}}"  type="button" class="btn btn-success"><i class="bi bi-eye"></i></a>
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
                                        "info": "Mostrando START a END de TOTAL Miembros",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Miembros",
                                        "infoFiltered": "(Filtrado de MAX total Miembros)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar MENU Miembros",
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
