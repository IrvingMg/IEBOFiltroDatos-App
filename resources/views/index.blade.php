<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
    </head>
    <body>
        <h1> Comparar datos IMSS y IEBO </h1>
        <form action="{{url('/comparar')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <ol>
                <li>
                    <label for="file1">Coincidencias CURP</label>
                    <input type="file" name="coincidenciasCurp" id="file1">
                </li>
                <li>
                    <label for="file2">Coincidencias Nombre y Fecha</label>
                    <input type="file" name="coincidenciasNomFec" id="file2">
                </li>
                <li>
                    <label for="file3">Coincidencias</label>
                    <input type="file" name="coincidencias" id="file3">
                </li>
            </ol>
            <footer>
                <input type="submit" value="Comparar">
            </footer>
        </form>
    </body>
</html>
