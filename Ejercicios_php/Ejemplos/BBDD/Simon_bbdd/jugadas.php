<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <link rel="stylesheet" href="simon.css">
  <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
<h1>Importacion/Exportacion de las jugadas</h1>
<div>
    <?php 
    include('login.php');
    if(isset($_POST['submit'])) {
        if($_POST['submit'] == "Exportat archivo del servidor"){
            $fh = fopen("testfile.txt", 'w') or die("Failed to create file");

        }

    ?>
</div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="submit" value="Exportat archivo del servidor" />
    </form>



</body>
</html>