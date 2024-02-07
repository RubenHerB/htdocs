<html>
<head>
<title>Mi Web</title>
</head>
<body>
<h1>Hola {{$nombre}}!</h1>
<h2>De edad {{$edad}}</h2>
El tiempo es {{time()}}
@for ($i=0;$i<10;$i++)
<br>El valor actual es {{$i}}
@endfor
</body>
</html>
