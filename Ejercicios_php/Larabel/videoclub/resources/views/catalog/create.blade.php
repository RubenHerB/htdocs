
@extends('layouts.master')
@section('contenido')
<h2>Añadir peliculas</h2>

<div class="col-sm-8">
    <form action="{{route('catalog.store')}}" method="post">
    @csrf
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Titulo de la pelicula</label>
  <input type="text" class="form-control" name="titulo">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Año de la pelicula</label>
  <input type="number" class="form-control" name="year">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Director de la pelicula</label>
  <input type="text" class="form-control" name="director">
  <br>
  <label for="exampleFormControlInput1" class="form-label">Url del poster de la pelicula</label>
  <input type="text" class="form-control" name="poster">
</div>
<br>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Sypnosis</label>
  <textarea class="form-control" name="sypnosis" rows="6"></textarea>
</div>
<br>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Añadir pelicula</button>
  </div>
    </form>
</div>
@endsection
