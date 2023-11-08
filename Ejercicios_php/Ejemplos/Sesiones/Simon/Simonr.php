<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
  width: 20%;
  border-radius: 50%;
  display: inline-block;
  margin-left: 4%;
  margin-top: 100px;
}
body{background-color: aquamarine;}
  </style>
</head>
<body>
<?php
    function pintar($c1,$c2,$c3,$c4)     {
        $c=array($c1,$c2,$c3,$c4);
        shuffle($c);
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:$p\"></span>";
      }

?>   
</body>
</html>