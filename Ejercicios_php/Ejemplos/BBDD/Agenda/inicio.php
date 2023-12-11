<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <h1>AGENDA</h1>
    <div>
    Hola <?php session_start(); echo $_SESSION['usu']; ?>, cuantos contactos deseas grabar?<br>
    Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.<br>
    Cuando el número sea el deseado pulsa GRABAR.

    </div>
    <div>
      <?php
      if(isset($_POST["inicio"])){
        if($_POST["inicio"] == "GRABAR"){
          header("Location: agenda.php");
      }else{
        $_SESSION['con']++;
        if($_SESSION['con']==5){
          header("Location: agenda.php");
        }
      }}
      
      for ($i=0;$i<$_SESSION['con'];$i++){
        echo "<img src=\"img/OIP".$_SESSION['emo'][$i].".jfif\">";
      }
        ?>
    </div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="submit" name="inicio" value="INCREMENTAR">
<input type="submit" name="inicio" value="GRABAR">
</form>
</body>
</html>