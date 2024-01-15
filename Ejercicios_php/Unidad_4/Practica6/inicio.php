<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function reducir(id) {
            var n=document.getElementById(id);
            if(n.value<99){
                n.value--;
            }
        }

        function reducir(id) {
            var n=document.getElementById(id);
            if(n.value>0){
                n.value--;
            }
        }
    </script>
</head>
    <body>
    <?php 
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>

    <h1>Hola, <?php echo $_SESSION["name"]; ?></h1>
    
    <h2>Nuestros productos</h2>
    <form method="post" action="">
    <?php
        include("login.php");
        $log= new login();
        $connection=$log->log_user();

    $query = "SELECT * FROM producto";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    $rows = $result->num_rows; 

    for ($i=0;$i<$rows;$i++){
        $result->data_seek($i);
        $p=$result->fetch_array(MYSQLI_ASSOC);
        echo "<article><img src=\"".$p["Image"]."\"><h3>".$p["Name"]."</h3>".$p["Description"]."<button class=\"btn\" onclick=\"reducir('b".$i."')\">-</button><input type=\"number\" min=\"0\" max=\"99\" value=\"0\" id=\"b".$i."\" class=\"numero\"><button class=\"btn\" onclick=\"aumentar('b".$i."')\">+</button></article>";
    }
    ?>
    </form>
    </body>
</html>