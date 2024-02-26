@extends('layouts.master')
@section('contenido')
<h2>Editar pelicula</h2>

<div class="col-sm-8">
    <form>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Titulo de la pelicula</label>
  <input type="text" class="form-control" name="titulo" value="{{$pelicula['title']}}">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Año de la pelicula</label>
  <input type="number" class="form-control" name="year" value="{{$pelicula['year']}}">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Director de la pelicula</label>
  <input type="text" class="form-control" name="director" value="{{$pelicula['director']}}">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Url del poster de la pelicula</label>
  <input type="text" class="form-control" name="poster" value="{{$pelicula['poster']}}">
</div>
<br>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Sypnosis</label>
  <textarea class="form-control" name="synopsis" rows="6">{{$pelicula['synopsis']}}</textarea>
</div>
<br>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Editar pelicula</button>
  </div>
    </form>
</div>
@endsection