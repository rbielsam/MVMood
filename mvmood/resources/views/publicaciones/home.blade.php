
@forelse($publicaciones as $publicacion)
    <p>{{$publicacion->contenido}}</p>
    @if(Auth::id() == $publicacion->user_id)
        <a href="/publicacion/editar/{{ $publicacion->id }}">Editar</a>
        <a href="/publicacion/eliminar/{{ $publicacion->id }}">Eliminar</a>
    @endif

@empty
    <p>No hi ha publicacions</p>
@endforelse
<br>
<a href="/publicacion/crear">Crea una publicacion</a>

<br>

<a href="/logout">logout</a>
