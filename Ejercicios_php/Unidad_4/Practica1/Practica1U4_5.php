

<html>
    <head>
        <title>Formulario bucle</title>
    </head>
    <body>
        <?php
        const num=9;//Numero de elementos en el formulario
        unset($_POST["submit"]);
        var_dump($_POST);
        echo(count($_POST));
        if(in_array("",$_POST)){
            $c=0;
        echo "el vector tiene ".num." elementos<br>";
            foreach($_POST as $key => $value){
                echo "$key = $value<br>";
                $c+=$value;
            }
            echo "la suma es $c<br>";
        }else{
            echo"Rellena todos los campos en el formulario<br><br>";}
        ?>
        <form method="post" action="Practica1U4_5.php" >
            <?php
            for($i=0;$i<num;$i++) {
                echo "$i <input type = \"text\" name = \"$i\"><br/><br/>";
            }
            ?>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>