<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de asistencias</title>
</head>
<body>
        <br>
        <h1>reporte de asistencias</h1>
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inlin table-sm" border="1"
        aria-describedby="example1_info">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">fecha</th>
                <th scope="col">nombre y apellido</th>          
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td><?php echo $i = $i + 1; ?></td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->miembro->nombre_apellido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>