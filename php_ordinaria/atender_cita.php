<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['citaatendida'])){
echo "<p style=\"color:red\">Error! La casilla de observaciones no puede estar vacia</p>";
}else{
    header("Location: citas_pendientes.php");
}
?>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:red; text-align:center;padding:15px;color:white">ATENDER CITA</h3>
            Paciente:
        </form>
</div>
</body>
</html>