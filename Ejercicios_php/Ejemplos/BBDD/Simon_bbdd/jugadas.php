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
    if(isset($_POST['submit'])) {
        include('login.php');
        if($_POST['submit'] == "Exportat archivo del servidor"){
            $fh = fopen("jugadas.txt", 'w') or die("Failed to create file");
            $text="";
            $log=new login();
            $connection=$log->log();
            $query = "SELECT codigousu, acierto FROM jugadas";
            $result = $connection->query($query);
            if (!$result) die("Fatal Error");
            $rows = $result->num_rows; 
            $ms=$result->fetch_all(MYSQLI_ASSOC);
            for ($i=0;$i<$rows;$i++){
            var_dump($ms[$i]);
                $text+=($ms[$i]['codigousu'].",".$ms[$i]['acierto']."
                ");
            }


            fwrite($fh, $text) or die("Could not write to file");
            fclose($fh);
            echo "El archivo se ha exportado correctamente";

        }
    }

    ?>
</div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="submit" value="Exportat archivo del servidor" />
    </form>



</body>
</html>