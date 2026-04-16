<!DOCTYPE html>
<html>
<head>
    <title>Crear</title>
</head>
<body>
<h1>Editar Perfil</h1>

<form method="post" action="/perfil/update">
    @csrf
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" id="nickname" value="{{$user->nickname}}">
    @error('nickname')
    <span role="alert">{{ $message }}</span>
    @enderror


    <div>
        <button type="submit">Actualizar</button>
    </div>
</form>
</body>
</html>
