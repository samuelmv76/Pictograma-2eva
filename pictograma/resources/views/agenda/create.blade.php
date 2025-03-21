<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva entrada en la Agenda</title>
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
            max-width: 800px;
            padding: 25px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
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
        .botones {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        button {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            transition: 0.3s;
        }
        .guardar {
            background-color: #28a745;
            color: white;
        }
        .guardar:hover {
            background-color: #218838;
        }
        .volver {
            background-color: #dc3545;
            color: white;
        }
        .volver:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/pictogramas">📂 Catálogo pictogramas</a>
        <a href="/agenda/create" class="active">📅 Nueva entrada en agenda</a>
        <a href="/agenda/show">📋 Mostrar agenda</a>
    </div>
    <div class="container">
        <h1>Añadir datos agenda</h1>
        <form method="POST" action="{{ url('/agenda/store') }}">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" required>
            </div>
            <div class="form-group">
                <label for="persona">Id. persona:</label>
                <select name="persona" required>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <label>Selecciona una imagen:</label>
            <div class="pictogramas">
                @foreach($imagenes as $img)
                    <div class="pictograma">
                        <input type="radio" name="imagen" value="{{ $img->idimagen }}" required>
                        <br>
                        <img src="{{ asset($img->imagen) }}" alt="Imagen">
                        <div><strong>{{ $img->descripcion }}</strong></div>
                    </div>
                @endforeach
            </div>
            <div class="botones">
                <button type="submit" class="guardar">Añadir entrada</button>
                <button type="button" class="volver" onclick="window.location.href='{{ url('/pictogramas') }}'">← Volver</button>
            </div>
        </form>
    </div>
</body>
</html>