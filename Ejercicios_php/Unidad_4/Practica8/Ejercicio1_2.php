<?php
session_name("UD4P5E1");
    session_start();
    switch ($_POST["submit"]) {
        case "+":
            $_SESSION["num"]++;
            break;
        case "-":
            $_SESSION["num"]--;
            break;
        default:
            $_SESSION["num"]=0;;
            break;
            }
            header("Location: Ejercicio1_1.php");
?>