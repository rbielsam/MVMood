<!DOCTYPE html>
<html>
<head>
    <title>Crear</title>
</head>
<body>
<h1>Crear publicacion</h1>

<form method="post" action="/publicacion/update">
    @csrf

    <label for="contenido">contenido</label>
    <input type="text" name="contenido" id="contenido" value="{{$publicacion->contenido}}">
    <input type="hidden" name="id" value="{{$publicacion->id}}">


    @error('contenido')
    <span role="alert">{{ $message }}</span>
    @enderror

    <div>
        <button type="submit">Publicar</button>
    </div>
</form>
</body>
</html>
