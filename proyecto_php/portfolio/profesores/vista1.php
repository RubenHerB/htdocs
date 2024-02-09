<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="../../css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png">
</head>
<?php
  var_dump($_POST);
    session_start();
    if(!isset($_SESSION)){
        header("Location: ../index.php");
        var_dump($_SESSION["tipo"]);
    }else{
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }else{
            var_dump("entro");
    if (isset($_POST["modo"])){
        $modo=intval($_POST["modo"]);
        $_SESSION["rolnow"]=$modo;
        var_dump($modo);
        switch($modo){
            case 1:
                header("Location: profesores/vista1.php");
                break;
            case 2:
                if(!$_SESSION["clase"]=$_POST["clase"]) die ("Error");                
                header("Location: profesores/tutor.php");
                break;
            case 3:
                header("Location: profesores/equipo.php");
                break;
            default:
                die("Error");
                break;  
        }
    }
        }

    }
    

  ?>
<body id="bd" data-bs-theme="light">
<?php include "../dark.php"; ?>
<div class="container border border-secondary rounded align-middle" style="margin-top: 40px">
<?php 

?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src=../dark.js></script>
<script type="text/javascript">
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    http_request.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
http_request.onreadystatechange = function(){
    // procesar la respuesta
};
</script>
</html>