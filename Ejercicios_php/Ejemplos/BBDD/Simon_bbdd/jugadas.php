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
    $log=new login();
    $connection=$log->log();
    if(isset($_POST['submit'])) {
        if($_POST['submit'] == "Exportat archivo del servidor"){
            $fh = fopen("jugadas.txt", 'w') or die("Failed to create file");
            $text="";
            $query = "SELECT codigousu, acierto FROM jugadas";
            $result = $connection->query($query);
            if (!$result) die("Fatal Error");
            $rows = $result->num_rows; 
            $ms=$result->fetch_all(MYSQLI_ASSOC);
            for ($i=0;$i<$rows;$i++){
                $text.=($ms[$i]['codigousu'].",".$ms[$i]['acierto']."
");
            }


            fwrite($fh, $text) or die("Could not write to file");
            fclose($fh);
            echo "El archivo se ha exportado correctamente";

        }else{
        if(isset($_FILES["fileToUpload"])) {
            $target_file =  basename($_FILES["fileToUpload"]["name"]);
                if((pathinfo($target_file,PATHINFO_EXTENSION))=='txt'){
                        if ($_FILES["fileToUpload"]["size"] <= 300000) {
                            echo "El fichero subido es correcto<br>";
                            if ($fp = fopen($_FILES["fileToUpload"]["tmp_name"], 'r')) {
                                echo "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se ha subido";       
                                $texte="";                 
                                                               
                                while (false !== ($caracter = fgetc($fp))) {                                    
                                $num1=(int)$caracter;
                                while(',' != ($caracter = fgetc($fp))){
                                    $num1*=10;
                                    $num1+=(int)$caracter; 
                                }

                                $query = 
                                "SELECT Codigo FROM usuarios WHERE Codigo LIKE $num1 LIMIT 1";
                                $result = $connection->query($query);
                                if (!$result) die("Fatal Error");
                                $rows=$result->num_rows     ;


                                $caracter = (int)fgetc($fp);

                                if($rows>0){                            
                                $query = 
                                "INSERT INTO jugadas (codigousu,acierto)
                                VALUES ($num1,$caracter)";
                                $result = $connection->query($query);
                                if (!$result) die("Fatal Error");
                                }else{                                    
                                    $texte.="$num1,$caracter
";
                                    }
                                
                                fgetc($fp);
                            }
                                $fe = fopen("error-log.txt", 'w') or die("Failed to create file");
                                fwrite($fe, $texte);
                                fclose($fe);
                                
                              } else {
                                echo "Ha habido un error al subir su archivo";
                              }
                              $connection->close();
                           }else{
                            echo "El fichero es demasiado grande.";
                           }   
                        
                }else{
                    echo "El fichero no esta en formato txt";
            }   
            
               }else{
                echo "No se ha subido ningun fichero";
            }
    }}
    ?>
</div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <input type="submit" name="submit" value="Exportat archivo del servidor" /><br>
    <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input">
<input type="submit" value="Importar archivo" name="submit">
    </form>



</body>
</html>