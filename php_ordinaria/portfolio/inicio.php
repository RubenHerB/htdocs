<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
    ?>
<h1 style="background-color:yellow; text-align:center;padding:15px; width:30%; margin-left:35%"><?php echo $_SESSION['user']['tipo']; ?></h1>
<?php 
switch ($_SESSION['user']['tipo']){
    case "Asistente":
        echo <<<_END

    _END;
    break;
    case "Medico":
        $usu="medico";
        $pass="medico";
    break;
    case "Administrador":
        $usu="adminconsulta";
        $pass="adminconsulta";
    break;

}
?>
</body>
</html>
