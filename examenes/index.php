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
        
    </div>
    <div id="controlesform" class="controlesform">
    
    </div>
</div>

<script>
function crear(){
    document.getElementById("content").innerHTML="Pregunta:<br><input type=\"text\" id=\"pregunta\"><br><br>Respuesta correcta:<br><input type=\"text\" id=\"respuestac\"><br><br>Respuesta incorrecta 1:<br><input type=\"text\" id=\"respuestai1\"><br><br>Respuesta incorrecta 2:<br><input type=\"text\" id=\"respuestai2\"><br><br>Respuesta incorrecta 3:<br><input type=\"text\" id=\"respuestai3\">";
    document.getElementById("controlesform").innerHTML="<div class=\"controlesformdiv\"><button onclick=\"guardar()\">Guardar Pregunta</button>                            <button onclick=\"cancelar()\">Cancelar</button></div>";
}
function cancelar(){
    document.getElementById("content").innerHTML="";
    document.getElementById("controlesform").innerHTML="";
}
</script>
</body>
</html>