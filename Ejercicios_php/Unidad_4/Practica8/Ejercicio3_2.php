<?php
session_name("UD4P5E3");
    session_start();
    switch ($_POST["submit"]) {
        case "←":
            if($_SESSION["x"]>0){
            $_SESSION["x"]-=20;
        }else{
            $_SESSION["x"]=600;
        }
            break;
        case "→":
            if($_SESSION["x"]<600){
                $_SESSION["x"]+=20;
            }else{
                $_SESSION["x"]=0;
            }
            break;
        case "↓":
            if($_SESSION["y"]<600){
                $_SESSION["y"]+=20;
            }else{
                $_SESSION["y"]=0;
            }
            break;
        case "↑":
            if($_SESSION["y"]>0){
                $_SESSION["y"]-=20;
            }else{
                $_SESSION["y"]=600;
            }
            break;
        default:
        $_SESSION["x"]=300;
        $_SESSION["y"]=300;
            break;
            }
            header("Location: Ejercicio3_1.php");
?>