var articulos=[]; 
var carrito=[];
var user=[];
if (sessionStorage.getItem("carrito")) {
  carrito = JSON.parse(sessionStorage.getItem("carrito"));
}else{
sessionStorage.setItem("carrito",JSON.stringify(carrito));
}

if (sessionStorage.getItem("user")) {
    user = JSON.parse(sessionStorage.getItem("user"));
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
    if(mostrar){
    document.getElementById("content").innerHTML = "";
    }
    data.forEach(function(articulo){
      articulos[parseInt(articulo['codArticulo']  )]=articulo;
      if(mostrar){
      document.getElementById("content").innerHTML+="<div class=\"row\"><div class=\"col-md-4\" id=\"pop\"><button type=\"button\" class=\"btn\" data-bs-toggle=\"modal\" data-bs-target=\"#modal"
        +articulo['codArticulo']+
        "\"><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/"+articulo['codArticulo']+".png\" alt=\"\" style=\"max-height:100px\"></button></div><div class=\"col-md-8\"><h3>"+articulo['nombre']+
          "</h3>"+(parseInt(articulo['cantidad'])<=parseInt(articulo['cantidadMinima'] )?(parseInt(articulo['cantidad'])>0?"<h5 class=\"ultimas\">Ultimas unidades de este articulo</h5>":""):"")+"<h6>Precio "+(parseFloat(articulo['PVP'])*(parseFloat(articulo['IVA'])+1)).toFixed(2)+" €</h6>"+(parseInt(articulo['cantidad'])>0?"<input id=\"cantidad"+articulo['codArticulo']+"\" type=\"number\" value=\"1\" min=\"1\" max=\""+articulo['cantidad']+"\" > <button class=\"btn btn-primary\" onclick=\"añadir("+articulo['codArticulo']+")\">Añadir al carrito</button>":"<h5 style=\"color:red\">Articulo agotado</h5>")+"</div></div><div class=\"modal fade\" id=\"modal"
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
  let precio=((parseFloat(articulos[parseInt(key)]['PVP'])*(parseFloat(articulos[parseInt(key)]['IVA'])+1)).toFixed(2));
  let cantidad=precio*carrito[key];
  total+=cantidad;
  document.getElementById('carritocontent').innerHTML+="<h4>"+articulos[parseInt(key)]['nombre']+"</h4><div>"+precio+"€ X "+carrito[key]+" = "+cantidad+"€</div>";
}
}
document.getElementById('total').innerHTML="<hr>Total: "+total+"€ <button class=\"btn btn-danger\" onclick=\"resetcarrito()\">Quitar todos los articulos</button> <button class=\"btn btn-primary\" onclick=\"comprar()\">Realizar compra</button>";

}else{
document.getElementById('carritocontent').innerHTML="El carrito esta vacio";
document.getElementById('total').innerHTML="";
}
document.getElementById('carritonumero').innerHTML=c;
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
    documento.getElementById('modalidentificacion').innerHTML="DNI:<br><input type=\"text\" class=\"form-control\" id=\"dni\" >";
    documento.getElementById('modalboton').innerHTML="<button type=\"button\" class=\"btn btn-primary\" onclick=\"comprobardni()\">Identificarte</button> O <button type=\"button\" class=\"btn btn-primary\" onclick=\"abrrirregistro()\">Registrarse</button>";
}

function abrrirregistro(){
    documento.getElementById('modalidentificacion').innerHTML="DNI:<br><input type=\"text\" class=\"form-control\" id=\"dni\" >";
    documento.getElementById('modalboton').innerHTML="<button type=\"button\" class=\"btn btn-primary\" onclick=\"identificar()\">Identificarte</button> O <button type=\"button\" class=\"btn btn-primary\" onclick=\"registrarusu()\">Registrarse</button>";
}

function identificarse(){
    let dni=document.getElementById('dni').value;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "ajax/ajaxarticulos.php",
        data: dni,
        success: function(data) {
            user['dni']=data.dni;
            user['nombre']=data.nombre;
            user['apellidos']=data.apellidos;
            user['direccion']=data.direccion;
            user['poblacion']=data.poblacion;
            user['correo']=data.correo;
        }
});
}


actualizar(true);