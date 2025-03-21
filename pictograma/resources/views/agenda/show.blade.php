<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Agenda</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #e9ecef;
        }
        img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .form-group {
            margin: 15px 0;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/pictogramas">📂 Catálogo pictogramas</a>
        <a href="/agenda/create">📅 Nueva entrada en agenda</a>
        <a href="/agenda/show" class="active">📋 Mostrar agenda</a>
    </div>
    <div class="container">
        <h1>Consultar Agenda de un Día</h1>
        <form method="POST" action="{{ url('/agenda/show') }}">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="persona">Persona:</label>
                <select name="persona" required>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Consultar</button>
        </form>

        @if(isset($agenda))
            <h2>Agenda del día</h2>
            <table>
                <tr>
                    <th>Pictograma</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
                @foreach($agenda as $item)
                    <tr>
                        <td><img src="{{ asset($item->imagen) }}" alt="Pictograma"></td>
                        <td>{{ $item->fecha }}</td>
                        <td>{{ $item->hora }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</body>
</html>