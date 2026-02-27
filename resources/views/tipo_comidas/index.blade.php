<!DOCTYPE html>
<html>
<head>
    <title>Tipos de Comida</title>
</head>
<body>

<h2>Registrar Tipo de Comida</h2>

{{-- MENSAJE SUCCESS --}}
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- ERRORES --}}
@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tipo_comidas.store') }}" method="POST">
    @csrf

    <select name="nombre_categoria" required>
        <option value="">Seleccionar categoría</option>
        <option value="Bebidas">Bebidas</option>
        <option value="Postres">Postres</option>
        <option value="Platillos Fuertes">Platillos Fuertes</option>
        <option value="Entradas">Entradas</option>
        <option value="Sopas">Sopas</option>
    </select>

    <button type="submit">Guardar</button>
</form>

<hr>

<h2>Lista de Categorías</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    @foreach($tipos as $tipo)
    <tr>
        <td>{{ $tipo->id_tipo_comida }}</td>
        <td>{{ $tipo->nombre_categoria }}</td>
        <td>

            {{-- ELIMINAR --}}
            <form action="{{ route('tipo_comidas.destroy', $tipo->id_tipo_comida) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

        </td>
    </tr>
    @endforeach

</table>

<a href="{{ route('comidas.index') }}">Ir a Comida</a>

</body>
</html>