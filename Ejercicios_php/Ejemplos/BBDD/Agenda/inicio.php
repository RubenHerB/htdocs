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
      $order=shuffle([0,1,2,3,4]);
      for ($i=1;$i<$_SESSION['con'];$i++){
        echo "<img src=\"img/OIP".$order[$i].".jfif\">";
      }
        ?>
    </div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<input type="submit">
</form>
</body>
</html>