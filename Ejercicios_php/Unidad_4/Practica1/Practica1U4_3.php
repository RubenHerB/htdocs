<html>
    <head>
    <title>Calc</title>
    </head>
    <body>
        <?php
        $a=0;
        $b=0;
        if(isset($_POST['a']) && isset($_POST['b'])) {
            if($_POST['a']!=null){
            $a=$_POST['a'];}
            if($_POST['b']!=null){
            $b=$_POST['b'];}
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
                if($b!=0){
                echo "$a / $b = ".$a/$b;
                }else{
                    if($a==0){
                        echo "$a / $b = !Error";
                    }else{
                    echo "$a / $b = ∞";
                }
                }
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
   
   