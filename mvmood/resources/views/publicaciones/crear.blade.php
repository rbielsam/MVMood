<!DOCTYPE html>
<html>
<head>
    <title>Crear</title>
</head>
<body>
<h1>Crear publicacion</h1>

<form method="post" action="/publicacion/guardar">
    @csrf

    <label for="contenido">contenido</label>
    <input type="text" name="contenido" id="contenido" value="{{ old('contenido') }}">

    @error('contenido')
    <span role="alert">{{ $message }}</span>
    @enderror

    <div>
        <button type="submit">Publicar</button>
    </div>
</form>
</body>
</html>
