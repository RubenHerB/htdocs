<?php
function validar_email($url){
$urlErr="Email correcto";
if (empty($url)) {
 $urlErr = "Se requiere Email";
 } else {
 if (!filter_var($url, FILTER_VALIDATE_URL)) {
 $urlErr = "Fomato de Email invalido";
 }
 }
return $urlErr;
}
?>