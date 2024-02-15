<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,.controlesformdiv{background-color: #ffb921; width:100%;padding:15px}
        .grid{display:grid; grid-template-columns:20% 80%;    justify-items: center;}
        .control{background-color:yellow;width : 100%}
        .content{background-color:light-gray;width : 100%}
    </style>
</head>
<body>
    <h1>Generador de formularios</h1>
    <div class="grid">
    <div id="control" class="control"><button onclick="crear()">Crear Pregunta</button><button onclick="generar()">Generar formulario</button></div>
    <div id="content" class="content"></div>
</div>
<div id="controlesform"></div>
</body>
</html>