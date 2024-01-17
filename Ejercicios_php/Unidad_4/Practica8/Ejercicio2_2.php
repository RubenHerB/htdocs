<?php
session_name("UD4P5E2");
    session_start();
    switch ($_POST["submit"]) {
        case "<-":
            if($_SESSION["ancho"]>0){
            $_SESSION["ancho"]-=20;
        }else{
            $_SESSION["ancho"]=600;
        }
            break;
        case "->":
            if($_SESSION["ancho"]<600){
                $_SESSION["ancho"]+=20;
            }else{
                $_SESSION["ancho"]=0;
            }
            break;
        default:
        $_SESSION["ancho"]=295;
            break;
            }
            header("Location: Ejercicio2_1.php");
?>