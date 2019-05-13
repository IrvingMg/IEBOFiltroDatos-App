<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
    </head>
    <body>
        <h1> Paso 1 de 2: Importar datos IEBO e IMSS </h1>
        <form action="{{url('/importar')}}" method="post" enctype="multipart/form-data">
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
                    <label for="file3">Relación de asegurados</label>
                    <input type="file" name="asegurados" id="file3">
                </li>
            </ol>
            <footer>
                <input type="submit" value="Importar">
            </footer>
        </form>
    </body>
</html>