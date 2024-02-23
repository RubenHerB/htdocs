@extends('layouts.master')
@section('contenido')
<div class="row">
<div class="col-sm-4">
<img src="{{$pelicula['poster']}}" style="height:200px"/>
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

			
</div>
</div>
@endsection
