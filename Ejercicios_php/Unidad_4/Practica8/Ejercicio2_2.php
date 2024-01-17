<?php
session_name("UD4P5E2");
    session_start();
    switch ($_POST["submit"]) {
        case "<-":
            $_SESSION["ancho"]-=20;
            break;
        case "->":
            $_SESSION["ancho"]+=20;
            break;
        default:
        $_SESSION["ancho"]=295;
            break;
            }
            header("Location: Ejercicio2_1.php");
?>