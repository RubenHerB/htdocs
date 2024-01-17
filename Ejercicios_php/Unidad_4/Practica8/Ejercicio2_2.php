<?php
session_name("UD4P5E2");
    session_start();
    switch ($_POST["submit"]) {
        case "<-":
            if($_SESSION["pos"]>0){
            $_SESSION["pos"]-=20;
        }else{
            $_SESSION["pos"]=600;
        }
            break;
        case "->":
            if($_SESSION["pos"]<600){
                $_SESSION["pos"]+=20;
            }else{
                $_SESSION["pos"]=0;
            }
            break;
        default:
        $_SESSION["pos"]=295;
            break;
            }
            header("Location: Ejercicio2_1.php");
?>