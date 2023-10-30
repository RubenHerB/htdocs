<html>
    <head>
        <title>Formulario bucle</title>
    </head>
    <body>
    <?php
        
        $t=false;
        $ar=array();
        if($_POST['n']==""){   
        $ar=$_POST;
        $t=true;
        }
        if(in_array("",$ar) && $ar["n"]==null && $t){
        unset($ar["submit"]);
        unset($ar["n"]);
            $c=0;
            foreach($ar as $key => $value){
                echo "$key = $value<br>";
                $c+=$value;
            }
            echo "la suma es $c<br>";
        }else{
            echo"Rellena todos los campos en el formulario<br><br>";}
            var_dump($_POST);
            var_dump($ar);
        ?>

            <!--Formulario para aceptar-->


        <form method="post" action="Practica1U4_7.php">
            Numero de elementos:
            <input type="text" name="n">    


                <!--Formulario generado-->

            <?php
            if(isset($_POST["n"])){
             if($_POST["n"]!=null){
                $num=$_POST["n"];
                echo"<br><br>";
            for($i=0;$i<$num;$i++) {
                echo "$i <input type = \"text\" name = \"$i\"><br/><br/>";
            }
            
        }}
            ?>
           <input type="submit" name="submit" value="Enviar">
            </form>
    </body>
</html>