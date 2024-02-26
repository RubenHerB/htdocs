@extends('layouts.master')
@section('contenido')
<div class="row">
<div class="col-sm-4">
<img src="{{$pelicula['poster']}}" style="height:500px"/>
</div>
<div class="col-sm-8">
<h2 style="min-height:45px;margin:5px 0 10px 0">
{{$pelicula['title']}}
</h2>
<p><b>Año:</b> {{$pelicula['year']}}</p>
<p><b>Director:</b> {{$pelicula['director']}}</p>
<p><b>Resumen:</b> {{$pelicula['synopsis']}}</p>
<p><b>Estado:</b> @if ($pelicula['synopsis'] === true)
Pelicula actualmente alquilada
@else
Pelicula disponible
@endif
</p>
<a href="{{ url('catalog/edit/' . $key ) }}" type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="12px" height="auto" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg>  Editar pelicula</a>
<a href="{{ url('catalog') }}" type="button" class="btn btn-secondary">< Volver al catalogo</a>
</div>
</div>
@endsection
