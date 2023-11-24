<?php
if(isset($_POST['fileToUpload']) && $_POST['fileToUpload'] == NULL) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Comprobamos si es una imagen real o falsa
 if (!file_exists($target_file)) {
    if((pathinfo('test2.txt',PATHINFO_EXTENSION))=='txt'){

    }else{
        echo "El fichero no esta en formato txt";
    $uploadOk = 0;
}
   }else{
    echo "El fichero ya existe.";
    $uploadOk = 0;}
   }else{
    echo "No se ha subido ningun fichero";
}
?>
