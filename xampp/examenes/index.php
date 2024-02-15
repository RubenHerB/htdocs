<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{background-color: #ffb921}
        .grid{display:grid;}
    </style>
</head>
<body>
    <h1>Generador de formularios</h1>
    <div class="grid">
    <div id="control" class="control"><button onclick="crear()">Crear Pregunta</button><button onclick="generar()">Generar formulario</button></div>
    <div id="content" class="content"></div>
</div>
</body>
</html>