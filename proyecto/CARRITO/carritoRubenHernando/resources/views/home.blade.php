@extends('layouts.app')

@section('content')
<div class="container-md text-light my-5 text-center">
    <div>
      <h1>Descubre Nuestra Tradición</h1>
      <div class="row justify-content-center align-items-center my-3">
      <div class="col-md-8 ">      
En El Sidrero, llevamos más de 70 años perfeccionando el arte de la sidra. 
Somos una familia apasionada por mantener viva la tradición asturiana de producir
la mejor sidra con un toque de amor y dedicación.
</div> 
<div class="col-md-3"> 
<img class="img-fluid rounded border border-light" src="{{URL('/img/llagar1.jpg')}}" alt="Imagen de nuestro llagar">
</div>
</div> 

    </div>
<hr>

<div class="container-md text-light my-5">
  <h1>Nuestra Historia</h1>        
  <div class="row justify-content-center align-items-center my-3">
    <div class="col-md-4">      
<img class="img-fluid rounded border border-light" src="{{URL('/img/llagar2.jpg')}}" alt="Imagen de los primeros años del llagar">
    </div>
  <div class="col-md-8"> 
<h2>Generaciones de Pasión y Compromiso</h2>
Desde 1952, nuestra familia ha trabajado incansablemente 
para llevar la auténtica experiencia de la sidra asturiana a tu mesa.
Cada botella cuenta una historia de esfuerzo, 
dedicación y el orgullo de pertenecer a una tradición centenaria.
</div>
</div>
</div>
<hr>
<div class="container-md text-light my-5 text-center">
  <div>
  <h1>Proceso Artesanal</h1>
  <div class="row justify-content-center align-items-center my-3">
    <div class="col-md-8 ">   
<h2>De la Manzana a la Botella</h2>
Te invitamos a explorar nuestro llagar y descubrir el 
proceso artesanal que da vida a nuestra sidra. Desde la 
cuidadosa selección de las manzanas hasta la fermentación 
y embotellado, cada paso se realiza con un compromiso inquebrantable 
con la calidad y la autenticidad.
</div> 
<div class="col-md-3"> 
<img class="img-fluid rounded border border-light" src="{{URL('/img/llagar3.jpg')}}" alt="Imagen de la recogida de manzanas">
</div>
  </div>
</div>


  </div>
</div>
@endsection
