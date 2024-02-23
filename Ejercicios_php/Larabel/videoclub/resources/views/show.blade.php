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
<p>Año: {{$pelicula['year']}}</p>
<p>Director: {{$pelicula['director']}}</p>
<p>{{$pelicula['synopsis']}}</p>

			'year' => '1999',
			'director' => 'David Fincher',
			'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjIwNTYzMzE1M15BMl5BanBnXkFtZTcwOTE5Mzg3OA@@._V1_SX214_AL_.jpg',
			'rented' => true,
			'synopsis'
</div>
</div>
@endsection
