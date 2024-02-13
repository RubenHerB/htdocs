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