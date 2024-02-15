<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,.controlesformdiv{background-color: #ffb921;padding:15px}
        h1{grid-area:header}
        .controlesform{grid-area:controlesform}
        .grid{display:grid;
            grid-template-areas: "header header header header header" 
                         "control content content content content" 
                       "controlesform controlesform controlesform controlesform controlesform";}
        .control{background-color:yellow;
        grid-area:control;
        }
        .content{background-color:light-gray;
            grid-area:content;
        }
    </style>
</head>
<body>
    
    <div class="grid">
    <h1 class="header">Generador de formularios</h1>
    <div id="control" class="control"><button onclick="crear()">Crear Pregunta</button><button onclick="generar()">Generar formulario</button></div>
    <div id="content" class="content"></div>
    <div id="controlesform" class="controlesform"></div>
</div>

</body>
</html>