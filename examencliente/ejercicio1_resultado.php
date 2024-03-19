<?php
	//Adaptada a Español
	header("Content-Type: text/html;charset=utf-8");

	if(empty($_POST)) {
		echo "ERROR en el método POST";
	}
	if($_POST['queId'] == '') { 
		echo "ERROR en el dato enviado";
	}
	$queId = addslashes($_REQUEST["queId"]);

	if ($queId == "alumno1")
		echo "APROBADO";
	else if ($queId == "alumno2")
		echo "APROBADO";
	else if ($queId == "alumno3")
		echo "SUSPENSO";
	else if ($queId == "alumno4")
		echo "APROBADO";
	else if ($queId == "alumno5")
		echo "APROBADO";
?>
