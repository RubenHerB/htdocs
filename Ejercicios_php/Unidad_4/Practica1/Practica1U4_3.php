<html>
    <head>
    <title>Calc</title>
    </head>
    <body>
        <?php
        if($_POST['a']!=null && $_POST['b']!=null) {
            $a=$_POST['a'];
            $b=$_POST['b'];
            switch($_POST['boton']){
            case "Suma":
                echo "$a + $b = ".$a+$b;
                break;
            case "Resta":
                echo "$a - $b = ".$a-$b;
                    break;
            case "Multiplicar":
                echo "$a * $b = ".$a*$b;
                break;
            case "Dividir":
                echo "$a / $b = ".$a/$b;
                break;
            }
        }
        ?>
   <br>
    <form method="post" action="Practica1U4_3.php">
     A:
    <input type="text" name="a"> 
    B:
    <input type="text" name="b"><br><br>
    <input type="submit" value="Suma" name="boton">
    <input type="submit" value="Resta" name="boton">
    <input type="submit" value="Multiplicar" name="boton">
    <input type="submit" value="Dividir" name="boton">
    </form>
    </body>
</html>
   
   