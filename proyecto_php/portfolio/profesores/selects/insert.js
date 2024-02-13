
function ajaxasig(idclase){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("asig").innerHTML=this.responseText;
    }
};
hr.open("POST","selects/selectasig.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("id="+idclase);
}




function ajaxalum(idasig){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("alum").innerHTML=this.responseText;
    }
};
hr.open("POST","selects/selectalum.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send(idasig);
}


document.querySelector("select[name=clase]").addEventListener("change", function(){
    console.log(document.getElementById("clase").value);
    if(document.getElementById("clase").value!="Clase"){
    ajaxalum(document.getElementById("clase").value);}else{
        document.getElementById("alum").innerHTML="<select class=\"form-select form-select-sm\" id=\"alumsel\" aria-label=\"Small select example\" disabled><option selected>Alumno</option></select>";
    } 
});

function grabar(){
    console.log((document.getElementById("clase").value)+"\&idalumno="+(document.getElementById("alumsel").value)+"\&infraccion="(document.getElementById("infra").value));
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        hr = new XMLHttpRequest();
        hr.overrideMimeType('text/xml');
    } else if (window.ActiveXObject) { // IE
        hr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    hr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("respuesta").innerHTML=this.responseText;
        }
    };
    hr.open("POST","selects/grabar.php");
    hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
    hr.send((document.getElementById("clase").value)+"\&idalumno="+(document.getElementById("alumsel").value)+"\&infraccion="(document.getElementById("infra").value)+"\&fecha="+(document.getElementById("tiempo").value));}