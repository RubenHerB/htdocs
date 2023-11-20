<?php
class url{
    function __construct(){

    }

 function validar_url($url){
$urlErr="Url correcta";
if (empty($url)) {
 $urlErr = "Se requiere Url";
 } else {
 if (!filter_var($url, FILTER_VALIDATE_URL)) {
 $urlErr = "Fomato de Url invalido";
 }
 }
return $urlErr;
}}
?>