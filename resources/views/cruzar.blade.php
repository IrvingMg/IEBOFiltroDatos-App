<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cruzar datos</title>
    </head>
    <body>
        <h1> Paso 2 de 2: Cruzar datos </h1>
        <ul>
            <li>
                <h2>Opción 1</h2>
                <p><em>Coincidencias CURP</em> con <em>Relación de asegurados</em></p>
                <a href="{{url('/cruzar/1')}}">
                    <button>Descargar resultados</button>
                </a>
            </li>
            <li>
                <h2>Opción 2</h2>
                <p><em>Coincidencias Nombre y Fecha</em> con <em>Relación de asegurados</em></p>
                <a href="{{url('/cruzar/2')}}">
                    <button>Descargar resultados</button>
                </a>
            </li>
            <li>
                <h2>Opción 3</h2>
                <p>
                    <em>Coincidencias CURP</em>, <em>Coincidencias Nombre y Fecha</em> con 
                    <em>Relación de asegurados</em>
                </p>
                <a href="{{url('/cruzar/3')}}">
                    <button>Descargar resultados</button>
                </a>
            </li>
            <li>
                <h2>Opción 4</h2>
                <p>
                    <strong>Remanentes:</strong> 
                    <em>Relación de asegurados</em> con
                    <em>Coincidencias CURP</em>, <em>Coincidencias Nombre y Fecha</em>
                    
                </p>
                <a href="{{url('/cruzar/4')}}">
                    <button>Descargar resultados</button>
                </a>
            </li>
        </ul>
    </body>
</html>