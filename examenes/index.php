<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{margin:0px;padding:0px}
        h1,.controlesformdiv{background-color: #ffb921;padding:15px}
        h1{grid-area:header}
        .controlesform{grid-area:controlesform}
        .grid{display:grid;
            grid-template-areas: "header header header header header" 
                         "control content content content content" 
                       "controlesform controlesform controlesform controlesform controlesform";
                       gap:0;
                    }
        .control{background-color:yellow;
        grid-area:control;
        text-align:center;
        min-height:500px;
        vertical-align:middle;
        }
        .content{background-color:lightgray;
            grid-area:content;
            min-height:500px;
        }
    </style>
</head>
<body>
    
    <div class="grid">
    <h1 class="header">Generador de formularios</h1>
    <div id="control" class="control">  
    <button onclick="crear()">Crear Pregunta</button>                            <button onclick="generar()">Generar formulario</button></div>
    <div id="content" class="content">
        Pregunta:
        <input type="text" id="pregunta"><br>
        Respuesta correcta:
        <input type="text" id="respuestac"><br>
        Respuesta incorrecta 1:
        <input type="text" id="respuestai1"><br>
        Respuesta incorrecta 2:
        <input type="text" id="respuestai2"><br>
        Respuesta incorrecta 3:
        <input type="text" id="respuestai3"><br>
    </div>
    <div id="controlesform" class="controlesform"></div>
</div>

<script>
function crear(){

}
</script>
</body>
</html>