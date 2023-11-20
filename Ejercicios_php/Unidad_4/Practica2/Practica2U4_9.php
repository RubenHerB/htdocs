<?php
class email{
    function __construct(){

    }

function validar_email($email){
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Fomato de Email invalido";
 }
 }
return $emailErr;
}}
?>