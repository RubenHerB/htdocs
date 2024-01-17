<?php
session_name("UD4P5E4");
    session_start();
    switch ($_POST["submit"]) {
        case "a":
            $_SESSION["a"]+=10;
            break;
        case "b":
            $_SESSION["b"]+=10;
            break;
            default:
            $_SESSION["a"]=0;
            $_SESSION["b"]=0;
                break;
            }
        header("Location: Ejercicio4_1.php");
?>