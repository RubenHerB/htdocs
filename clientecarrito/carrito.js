var articulos=[]; 
var carrito=[];
var user=[];
var historia=[];
if (sessionStorage.getItem("carrito")) {
  carrito = JSON.parse(sessionStorage.getItem("carrito"));
}else{
sessionStorage.setItem("carrito",JSON.stringify(carrito));
}

if (sessionStorage.getItem("user")) {
    user = JSON.parse(sessionStorage.getItem("user"));
    if(typeof user['DNI']!='undefined'){
        usuariolisto();
    }
  }else{
  sessionStorage.setItem("user",JSON.stringify(user));
  }
console.log(carrito);


function actualizar(mostrar){$.ajax({
  type: "POST",
  dataType: "json",
  url: "ajax/ajaxarticulos.php",
  data: "",
  success: function(data) {
    console.log(data);
    if(mostrar){
    document.getElementById("content").innerHTML = "";
    }
    data.forEach(function(articulo){
      articulos[parseInt(articulo['codArticulo']  )]=articulo;
      if(mostrar){
      document.getElementById("content").innerHTML+="<div class=\"row\"><div class=\"col-md-4\" id=\"pop\"><button type=\"button\" class=\"btn\" data-bs-toggle=\"modal\" data-bs-target=\"#modal"
        +articulo['codArticulo']+
        "\"><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/"+articulo['codArticulo']+".png\" alt=\"\" style=\"max-height:100px\"></button></div><div class=\"col-md-8\"><h3>"+articulo['nombre']+
          "</h3>"+(parseInt(articulo['cantidad'])<=parseInt(articulo['cantidadMinima'] )?(parseInt(articulo['cantidad'])>0?"<h5 class=\"ultimas\">Ultimas unidades de este articulo</h5>":""):"")+"<p>Stock: "+articulo['cantidad']+"</p><h6>Precio "+(parseFloat(articulo['PVP'])*((parseFloat(articulo['IVA'])/100)+1)).toFixed(2)+" €</h6>"+(parseInt(articulo['cantidad'])>0?"<input id=\"cantidad"+articulo['codArticulo']+"\" type=\"number\" value=\"1\" min=\"1\" max=\""+articulo['cantidad']+"\" > <button class=\"btn btn-primary\" onclick=\"añadir("+articulo['codArticulo']+")\">Añadir al carrito</button>":"<h5 style=\"color:red\">Articulo agotado</h5>")+"</div></div><div class=\"modal fade\" id=\"modal"
          +articulo['codArticulo']+"\" tabindex=\"-1\" aria-labelledby=\"modalLabel"
          +articulo['codArticulo']+"\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">"
          +articulo['nombre']+"</h1><button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button></div><div class=\"modal-body\"><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/"
          +articulo['codArticulo']+".png\" alt=\"\" style=\"height:auto;width:600px\"></div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cerrar</button></div></div></div></div><hr style=\"margin-top:10px\">";

        }
        
        });
        actualizar_carrito();
  },
  error: function(data){
     console.log("Error");
  }
});
}





function abrircarrito(){
document.getElementById('carrito').style.visibility="visible";
}
function cerrarcarrito(){
document.getElementById('carrito').style.visibility="hidden";
}

function actualizar_carrito(){
sessionStorage.setItem("carrito",JSON.stringify(carrito));
let c=0;
if (carrito!=""){
let total=0;
document.getElementById('carritocontent').innerHTML="";
for (var key in carrito){
  console.log(parseInt(carrito[key]));
  if (!isNaN(parseInt(carrito[key]))){
    c+=parseInt(carrito[key]);
  let precio=((parseFloat(articulos[parseInt(key)]['PVP'])*((parseFloat(articulos[parseInt(key)]['IVA'])/100)+1)).toFixed(2));
  let cantidad=precio*carrito[key];
  total+=cantidad;
  document.getElementById('carritocontent').innerHTML+="<h4>"+articulos[parseInt(key)]['nombre']+"</h4><div>"+precio+"€ X "+carrito[key]+" = "+cantidad+"€<input id=\"carrito"+key+"\" type=\"number\" value=\"1\" min=\"1\" max=\""+carrito[key]+"\" > <button class=\"btn btn-primary\" onclick=\"quitar("+key+")\">Quitar del carrito</button> <button class=\"btn btn-primary\" onclick=\"quitartodos("+key+")\">Quitar todos del carrito</button></div>";
    
}
}
document.getElementById('total').innerHTML="<hr>Total: "+total+"€ <button class=\"btn btn-danger\" onclick=\"resetcarrito()\">Quitar todos los articulos</button> <button class=\"btn btn-primary\" onclick=\"comprar()\">Realizar compra</button>";
if(c==0){
    document.getElementById('carritocontent').innerHTML="El carrito esta vacio";
document.getElementById('total').innerHTML="";
}
}else{
document.getElementById('carritocontent').innerHTML="El carrito esta vacio";
document.getElementById('total').innerHTML="";
}
document.getElementById('carritonumero').innerHTML=c;
}

function quitar(id){
    carrito[id]-=parseInt(document.getElementById('carrito'+id).value);
    if(carrito[id]<=0){
    carrito[id]='undefined';
    }
    actualizar_carrito();
}

function quitartodos(id){
    carrito[id]='undefined';
    actualizar_carrito();
}


function resetcarrito(){
carrito=[];
console.log(carrito);
actualizar_carrito();
}

function añadir(id){

actualizar(false);
console.log(articulos);
let anadiendo=parseInt(document.getElementById('cantidad'+id).value);
let anadido=0;
if(typeof carrito[id]!=='undefined'){
  anadido=parseInt(carrito[id]);
}
let total=anadido+anadiendo;
if(total<=parseInt(articulos[id]['cantidad'])){
  carrito[id]=total;
console.log(carrito);
}else{
alert("No hay tantos articulos disponibles")
}
actualizar(true);
}

function identificar(){
    document.getElementById('modalidentificacion').innerHTML="DNI:<br><input type=\"text\" class=\"form-control\" id=\"dni\" >";
    document.getElementById('modalboton').innerHTML="<button type=\"button\" class=\"btn btn-primary\" onclick=\"comprobardni()\">Identificarte</button> O <button type=\"button\" class=\"btn btn-primary\" onclick=\"abrrirregistro()\">Registrarse</button>";
}

function abrrirregistro(){
    document.getElementById('modalidentificacion').innerHTML="DNI:<br><input type=\"text\" class=\"form-control\" id=\"dni\" ><br>Nombre:<br><input type=\"text\" class=\"form-control\" id=\"nombre\" ><br>Apellidos:<br><input type=\"text\" class=\"form-control\" id=\"apellidos\" ><br>Direccion:<br><input type=\"text\" class=\"form-control\" id=\"direccion\" ><br>Poblacion:<br><input type=\"text\" class=\"form-control\" id=\"poblacion\" ><br>Correo:<br><input type=\"text\" class=\"form-control\" id=\"correo\" >";
    document.getElementById('modalboton').innerHTML="<button type=\"button\" class=\"btn btn-primary\" onclick=\"identificar()\">Identificarte</button> O <button type=\"button\" class=\"btn btn-primary\" onclick=\"registrarusu()\">Registrarse</button>";
}

function validarmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }

  function tienenumeros(str) {
    var matches = str.match(/\d+/g);
if (matches != null) {
    return true;
}else{
    return false;
}
  }


function registrarusu(){
    let dni=document.getElementById('dni').value.toUpperCase();
    if(dni.length==9){
        var dniaux=separarLetraDni(dni);
        if(calcularLetraDni(dniaux[0])==dniaux[1]){
            var correo=document.getElementById('correo').value;
            if (validarmail(correo)){
                let nombre=document.getElementById('nombre').value;
                let ape=document.getElementById('apellidos').value;
                let direc=document.getElementById('direccion').value;
                let pobla=document.getElementById('poblacion').value;
                if(nombre!=""&&ape!=""&&direc!=""&&pobla!=""){
                    if(!tienenumeros(nombre)&&!tienenumeros(ape)&&!tienenumeros(pobla)){
user['DNI']=dni;
user['nombre']=nombre
    user['apellidos']=ape;
    user['direccion']=direc;
    user['poblacion']=pobla;
    user['correo']=correo;
    sessionStorage.setItem("user",JSON.stringify(user));
    $.ajax({
        type: "POST",
        url: "ajax/ajaxcreateuser.php",
        data: "DNI="+user["DNI"]+"&nombre="+user["nombre"]+"&apellidos="+user["apellidos"]+"&direccion="+user["direccion"]+"&poblacion="+user["poblacion"]+"&correo="+user["correo"],
    success: function() {
            alert("Usuario creado con exito");
            usuariolisto();
        }
    });
}else{
    alert("Porfavor, rellena todos los campos con el formato correcto");
}
}else{
    alert("Porfavor, rellena todos los campos");
}
}else{
    alert("Formato de correo incorrecto");
}
}else{
    alert("El DNI introducido no se corresponde al de un español de pura cepa");
}
}else{
alert("El DNI introducido es demasiado corto");
}
}




function usuariolisto(){
    document.getElementById('modalidentificacion').innerHTML="DNI:<br>"+user['DNI']+"<br>Nombre:<br><input type=\"text\" class=\"form-control\" id=\"nombre\" value=\""+user['nombre']+"\"><br>Apellidos:<br><input type=\"text\" class=\"form-control\" id=\"apellidos\" value=\""+user['apellidos']+"\"><br>Direccion:<br><input type=\"text\" class=\"form-control\" id=\"direccion\" value=\""+user['direccion']+"\"><br>Poblacion:<br><input type=\"text\" class=\"form-control\" id=\"poblacion\" value=\""+user['poblacion']+"\"><br>Correo:<br><input type=\"text\" class=\"form-control\" id=\"correo\" value=\""+user['correo']+"\">";
    document.getElementById('modalboton').innerHTML="<button type=\"button\" class=\"btn btn-primary\" onclick=\"editarusuario()\">Editar</button> O <button type=\"button\" class=\"btn btn-danger\" onclick=\"usuariologout()\">Cerrar sesion</button>";
    document.getElementById('botonidentificacion').innerHTML="<button type=\"button\" class=\"btn btn-outline-none\" aria-current=\"page\" data-bs-toggle=\"modal\" data-bs-target=\"#modalidentificar\" onclick=\"usuariolisto()\">"+user['DNI']+"</button>";
}

function calcularLetraDni(nie) {
    let cadena = "TRWAGMYFPDXBNJZSQVHLCKET";
    nie = parseInt(nie);
    let posicion = nie % (cadena.length - 1);
    return cadena[posicion];
  }

  function separarLetraDni(dni){
   
var regex = new RegExp('([0-9]+)|([a-zA-Z]+)','g');
var splittedArray = dni.match(regex);
    return splittedArray;
  }


function editarusuario(){
    var correo=document.getElementById('correo').value;
    if (validarmail(correo)){
        let nombre=document.getElementById('nombre').value;
        let ape=document.getElementById('apellidos').value;
        let direc=document.getElementById('direccion').value;
        let pobla=document.getElementById('poblacion').value;
        if(nombre!=""&&ape!=""&&direc!=""&&pobla!=""){
            if(!tienenumeros(nombre) && !tienenumeros(ape) && !tienenumeros(pobla)){
user['nombre']=nombre
user['apellidos']=ape;
user['direccion']=direc;
user['poblacion']=pobla;
user['correo']=correo;
    console.log(user);
    sessionStorage.setItem("user",JSON.stringify(user));
    $.ajax({
        type: "POST",
        url: "ajax/ajaxedituser.php",
        data: "DNI="+user["DNI"]+"&nombre="+user["nombre"]+"&apellidos="+user["apellidos"]+"&direccion="+user["direccion"]+"&poblacion="+user["poblacion"]+"&correo="+user["correo"],
    success: function() {
            alert("Usuario editado con exito");
            usuariolisto();
        }
    });
}else{
    alert("Porfavor, rellena todos los campos con el formato correcto");
}
}else{
    alert("Porfavor, rellena todos los campos");
}
}else{
    alert("Formato de correo incorrecto");
}
    }


function usuariologout(){
    user=[];
    resetcarrito();
    sessionStorage.setItem("user",JSON.stringify(user));
    identificar();
    document.getElementById('botonidentificacion').innerHTML="<button type=\"button\" class=\"btn btn-outline-none\" aria-current=\"page\" data-bs-toggle=\"modal\" data-bs-target=\"#modalidentificar\" onclick=\"identificar()\">Identificarse/Registrarse</button>";
    actualizar(true);
}



function comprobardni(){
    let dni=document.getElementById('dni').value.toUpperCase();
    if(dni.length==9){
        var dniaux=separarLetraDni(dni);
        if(calcularLetraDni(dniaux[0])==dniaux[1]){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "ajax/ajaxusers.php",
        data: "dni="+dni,
        success: function(data) {
            console.log(data);
            if(data.length > 0){
            user=data[0];
            sessionStorage.setItem("user",JSON.stringify(user));
            console.log(user);
            usuariolisto();
            }else{
                alert("El DNI introducido no corresponde a ninguna cuenta, por favor, comprueba que sea correcto o registralo");
            }
        },
        error: function(data){
            console.log(data);
            alert("El DNI introducido no corresponde a ninguna cuenta, por favor, comprueba que sea correcto o registralo");
        }
});
        }else{
            alert("El DNI introducido no se corresponde al de un español de pura cepa");
        }
}else{
    alert("El DNI introducido es demasiado corto");
}
}

function comprar(){
    if(typeof user['DNI']=='undefined'){
        identificar();
    $('#modalidentificar').modal('show');
    alert('Introduce tu dni antes de realizar la compra');
    }else{
        let datasent="dni="+user['DNI'];
        for (var key in carrito){
            if (!isNaN(parseInt(carrito[key]))){
                    datasent+="&"+key+"="+carrito[key];
                }
            }
    console.log(datasent);
    $.ajax({
        type: "POST",
        url: "ajax/ajaxcompra.php",
        data: datasent,
        success: function(result) {
            console.log(result);
            alert("Comprarealizada con exito");
            resetcarrito();
            actualizar(true);
        }
    });}
}

function difdias(d) {
    let d1=new Date(d);
    let d2=new Date();
    var diff = Math.abs(d1.getTime() - d2.getTime());
    if( (diff / (1000 * 60 * 60 * 24))>16){
        return false;
    }else{
        return true;
    }
  }


function historial(){
    if(typeof user['DNI']=='undefined'){
        identificar();
        $('#modalidentificar').modal('show');
        alert('Introduce tu dni antes de ver el historial');
        }else{
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "ajax/ajaxhistorial.php",
                data: "dni="+user['DNI'],
                success: function(result) {
                    console.log(result);
                    document.getElementById("content").innerHTML = "";
                    console.log(result);
                    console.log(historia);
                    let v=0;
                    result.forEach(function(linea){
                        if(v!=linea['codVenta']){
                            v=linea['codVenta'];
                            document.getElementById("content").innerHTML +="<hr><h2>"+linea['fecha']+"</h2>";
                            
                        }
                        document.getElementById("content").innerHTML +="<div>"+linea['cantidad']+" X "+articulos[linea['codArticulo']]['nombre']+
                        (difdias(linea['fecha'])?"<input type=\"number\" id=\"h"+linea['CodLinea']+"\" max=\""+linea['cantidad']+"\" min=\"1\" value=\"1\"><button type=\"button\" class=\"btm btn-outline-danger\" onclick=\"devolver("+linea['CodLinea']+")\">Devolver</button><button type=\"button\" class=\"btm btn-outline-danger\" onclick=\"devolverlinea("+linea['CodLinea']+")\">Todos</button>":"")+"</div>";
                    });
                }
            });
        }
        }


function devolverlinea(id){
    $.ajax({
        type: "POST",
        url: "ajax/ajaxdevolverlinea.php",
        data: "id="+id,
        success: function(result) {
            console.log(result);
            alert("Devolucion realizada con exito");
            historial();
        }
    });
}

function devolver(id){
    $.ajax({
        type: "POST",
        url: "ajax/ajaxdevolver.php",
        data: "id="+id+"&cantidad="+document.getElementById('h'+id).value,
        success: function(result) {
            console.log(result);
            alert("Devolucion realizada con exito");
            historial();
        }
    });
}


actualizar(true);