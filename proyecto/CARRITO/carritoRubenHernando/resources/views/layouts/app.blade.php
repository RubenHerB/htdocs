<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!--<link href="/assets/css/estilos.css" rel="stylesheet">-->

    <style>
        @font-face {
    font-family: 'Montserrat';
    src: url('/css/monstserrat/Montserrat-VariableFont_wght.ttf') format('truetype');   
  }
  @font-face {
    font-family: 'Lato';
    src: url('/css/lato/Lato-Regular.ttf') format('truetype');   
  }
  @font-face{
    font-family: 'Playfare';
    src: url('/css/playfair/PlayfairDisplay-VariableFont_wght.ttf') format('truetype');
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

html{background: url("/img/llagar.png") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;background-color: black;}

  .titulo {font-size: 35px;font-family: 'Playfare', sans-serif;color: #4b4b4b;vertical-align: middle;}
.titulo span{color: black;font-family: 'Playfare', sans-serif;}

nav{
    background-color: #13E674;
}
.imagenico{
    max-width: 60px;
    height: auto;
}
.nav-link{
  padding: 35.5px 50px;
        font-family: 'Lato', sans-serif;
}

.nav-link:hover{background-color: #13C774;
  -webkit-animation: color_change 0.5s;
  -moz-animation: color_change 0.5s;
  -ms-animation: color_change 0.5s;
  -o-animation: color_change 0.5s;
  animation: color_change 0.5s;}

  @-webkit-keyframes color_change {
    from { background-color: #13E674; }
    to { background-color: #13C774; }
}
@-moz-keyframes color_change {
    from { background-color: #13E674; }
    to { background-color: #13C774; }
}
@-ms-keyframes color_change {
    from { background-color: #13E674; }
    to { background-color: #13C774; }
}
@-o-keyframes color_change {
    from { background-color: #13E674; }
    to { background-color: #13C774; }
}
@keyframes color_change {
    from { background-color: #13E674; }
    to { background-color: #13C774; }
}
.redes a img{height: auto;width: 45px ;border-radius: 1%;padding: 3px;}

    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    @include('partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

</body>
</html>
