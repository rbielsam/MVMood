
@forelse($publicaciones as $publicacion)
    <p>{{$publicacion->contenido}}</p>
    <a href="/publicacion/editar/{{ $publicacion->id }}">Editar</a>
@empty
    <p>No hi ha publicacions</p>
@endforelse
<a href="/publicacion/crear">Crea una publicacion</a>

<br>

<a href="/logout">logout</a>
