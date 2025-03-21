<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Pictogramas</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding-top: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-y: auto;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #e9ecef;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 5px;
            display: flex;
            align-items: center;
            border-radius: 5px;
        }
        .navbar a:hover, .navbar a.active {
            background-color: #d6d8db;
        }
        .container {
            max-width: 900px;
            padding: 25px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            text-align: center;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .pictogramas {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .pictograma {
            text-align: center;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .pictograma img {
            width: 100px;
            height: 100px;
            border-radius: 6px;
        }
        .descripcion {
            margin-top: 5px;
            font-weight: bold;
        }
        .ruta {
            font-size: 0.9em;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/catalogo" class="active">📂 Catálogo pictogramas</a>
        <a href="/agenda/create">📅 Nueva entrada en agenda</a>
        <a href="/agenda/show">📋 Mostrar agenda</a>
    </div>
    <div class="container">
        <h1>Listado de Pictogramas</h1>
        <div class="pictogramas">
            @foreach($imagenes as $img)
                <div class="pictograma">
                    <img src="{{ asset($img->imagen) }}" alt="Pictograma">
                    <div class="descripcion">{{ $img->descripcion }}</div>
                    <div class="ruta">{{ $img->imagen }}</div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
