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
    <button onclick="crear()">Crear Pregunta</button><button onclick="generar()">Generar formulario</button></div>
    <div id="content" class="content">
        
    </div>
    <div id="controlesform" class="controlesform">
    
    </div>
</div>

<script>
    var c=0;
    var aciertos=0;
function crear(){
    document.getElementById("content").innerHTML="Pregunta:<br><input type=\"text\" id=\"pregunta\"><br><br>Respuesta correcta:<br><input type=\"text\" id=\"respuestac\"><br><br>Respuesta incorrecta 1:<br><input type=\"text\" id=\"respuestai1\"><br><br>Respuesta incorrecta 2:<br><input type=\"text\" id=\"respuestai2\"><br><br>Respuesta incorrecta 3:<br><input type=\"text\" id=\"respuestai3\">";
    document.getElementById("controlesform").innerHTML="<div class=\"controlesformdiv\"><button onclick=\"guardar()\">Guardar Pregunta</button>                            <button onclick=\"cancelar()\">Cancelar</button></div>";
    document.getElementById("control").innerHTML="";
}
function cancelar(){
    document.getElementById("content").innerHTML="";
    document.getElementById("controlesform").innerHTML="";
    document.getElementById("control").innerHTML="<button onclick=\"crear()\">Crear Pregunta</button><button onclick=\"generar()\">Generar formulario</button>";

}

function guardar(){
    if(document.getElementById("pregunta").value!="" && document.getElementById("respuestac").value!="" && document.getElementById("respuestai1").value!="" && document.getElementById("respuestai2").value!="" && document.getElementById("respuestai3").value!="" ){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("control").innerHTML+=this.responseText;
        document.getElementById("control").innerHTML="<h1>Respuesta grabada correctamente</h1>";
        
        setTimeout(cancelar(),2500);
    }
};
hr.open("POST","insert.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("pregunta="+document.getElementById("pregunta").value+"&respuestacorrecta="+document.getElementById("respuestac").value+"&respuestaincorrecta1="+document.getElementById("respuestai1").value+"&respuestaincorrecta2="+document.getElementById("respuestai2").value+"&respuestaincorrecta3="+document.getElementById("respuestai3").value);
}else{
    document.getElementById("control").innerHTML="<h1>Rellena todos los campos</h1><br>"+document.getElementById("control").innerHTML;
}
}


function generar(){
    document.getElementById("controlesform").innerHTML="";
    c=0;
    aciertos=0;
   if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("content").innerHTML=this.responseText;
    }
};
hr.open("POST","export.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send();
}

function comprobar(id){
var res="";
var resn=0;
var resnc=0;
var baseres="";
var radios = document.getElementsByName('res'+id);
                    for (var j = 0, length = radios.length; j < length; j++) {
                    if (radios[j].checked) {
                    res=radios[j].value;
                    resn=j;
                    break;
                    }
                        }
if(res !=""){
    c++;
if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        baseres=this.responseText;
        document.getElementById("b"+id).innerHTML="";
if(baseres==res){
document.getElementById("l"+id+resn).style.color="lightgreen";
aciertos++;
}else{
    document.getElementById("l"+id+resn).style.color="red";
    document.getElementById("l"+id+resn).style.textDecoration="line-through";
for (var i = 0; i < 4; i++) {
                    if (radios[i].value == baseres) {
                    resnc=j;
                    break;
                    }                
}
document.getElementById("l"+id+resnc).style.color="lightgreen";
}

if(c==10){
    document.getElementById("controlesform").innerHTML="Aciertos "+aciertos+"/10";
}
}
    }
};
hr.open("POST","comprobar.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("id="+id);

console.log(baseres+"-"+res);

}
</script>
</body>
</html>