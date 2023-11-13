<html>
    <head>
    <title>Calendario</title>
    <style>
        caption,td,th {border: 1px solid black;padding: 4px;text-align: center;}
        table {border-collapse: collapse}
        th,caption{background-color: blue;color: white;}
        .fd{background-color:lightgreen}
    </style>
    </head>
    <body>
    <form method="post" action="Practica1U4_4.php">
     Introduce un mes
    <input type="text" name="m"> 
    Introduce un año:
    <input type="text" name="a"><br><br>
    <input type="submit">
    </form>
    <br><br>
    <?php
    if(isset($_POST['a']) && isset($_POST['m'])) {
        $y=$_POST['a'];
        $m=$_POST['m'];
        $nd=cal_days_in_month(CAL_GREGORIAN,$m,$y)+1;
        var_dump(cal_days_in_month(CAL_GREGORIAN,$m,$y));
        $c=date('w', strtotime("$y-$m-1"))-1;
        if($c<0){
            $c=6;
        }
        echo " <table><caption>Calendario $m/$y</caption>
        <tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>
        ";
        for($i=0;$i<$c;$i++) {
        echo "<td></td>";
        }
        for($i=1;$i<$nd;$i++) {
            if($c==7){
                echo"</tr><tr>";
                $c=0;
            }
            if($c==5||$c==6) {
            echo "<td class=\"fd\">$i</td>";
            }else{
                echo "<td>$i</td>"; 
            }
            $c++;
    }
    echo "</tr>";
}
    ?>
    </body>
</html>
   