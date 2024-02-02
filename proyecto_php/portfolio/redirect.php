<?php
session_start();
switch ($_SESSION["tipo"]){
    case 0:
        header("Location: profesorprin.php");
        break;
    case 1:
        header("Location: alumnoprin.php");
        break;
    case 2:
        header("Location: tutorprin.php");
        break;
}

?>