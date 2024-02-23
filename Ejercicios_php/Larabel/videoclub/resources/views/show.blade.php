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
</div>
</div>
@endsection
