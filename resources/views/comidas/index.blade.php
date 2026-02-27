<!DOCTYPE html>
<html>
<head>
    <title>Comidas</title>
</head>
<body>

<h2>Registrar Comida</h2>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('comidas.store') }}" method="POST">
    @csrf

    <input type="text" name="nombre_comida" placeholder="Nombre de la comida" required>

    <input type="number" name="costo" step="0.01" placeholder="Costo" required>

    <textarea name="detalle_comida" placeholder="Detalle" required></textarea>

    <select name="id_tipo_comida" required>
        <option value="">Seleccionar categoría</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id_tipo_comida }}">
                {{ $tipo->nombre_categoria }}
            </option>
        @endforeach
    </select>

    <button type="submit">Guardar</button>
</form>

<hr>

<h2>Lista de Comidas</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Costo</th>
        <th>Detalle</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>

    @foreach($comidas as $comida)
    <tr>
        <td>{{ $comida->id_comida }}</td>
        <td>{{ $comida->nombre_comida }}</td>
        <td>${{ $comida->costo }}</td>
        <td>{{ $comida->detalle_comida }}</td>
        <td>{{ $comida->tipoComida->nombre_categoria }}</td>
        <td>

            <form action="{{ route('comidas.destroy', $comida->id_comida) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

        </td>
    </tr>
    @endforeach

</table>

<a href="{{ route('tipo_comidas.index') }}">Ir a Categorías</a>

</body>
</html>