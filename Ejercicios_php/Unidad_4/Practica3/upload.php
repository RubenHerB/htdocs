<?php
if(isset($_FILES["fileToUpload"])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if((pathinfo($target_file,PATHINFO_EXTENSION))=='txt'){
        if (!file_exists($target_file)) {
            if ($_FILES["fileToUpload"]["size"] <= 300000) {
                echo "El fichero subido es correcto<br>";
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se ha subido";
                  } else {
                    echo "Ha habido un error al subir su archivo";
                  }
               }else{
                echo "El fichero es demasiado grande.";
               }   
            }else{
            echo "El fichero ya existe.";}
    }else{
        echo "El fichero no esta en formato txt";
}   

   }else{
    echo "No se ha subido ningun fichero";
}

?>
