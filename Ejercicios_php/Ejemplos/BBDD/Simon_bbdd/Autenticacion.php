<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
  border-radius: 50%;
  width: 20%;
  margin-right: 2.5%;
  margin-left: 2.5%;
  display: inline-block;
  margin-bottom: 10px;
  margin-top: 20px;
  
}

form{
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
input[type="submit"] {
  padding: 10px;
  border-radius: 10px;
}
input[type="submit"]:hover{
    box-shadow: 0px 5px 10px black;
    transform: translateY(5px);
}
body{background-color: aquamarine;text-align: center;}
  </style>
</head>
<body>
    <?php


$conn = new mysqli('localhost', 'root', '', 'bdsimon');
if ($conn->connect_error) die("Fatal Error");


$query = "SELECT * FROM classics";
 $result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 
$l=false;
$c=0;



 if (isset($_SERVER['PHP_AUTH_USER']) &&
 isset($_SERVER['PHP_AUTH_PW']))
 {
  for ($i=0; $i<$rows ; $i++){
    $result->data_seek($j); 
 if ($result->ffetch_assoc()['Nombre']===$_SERVER['PHP_AUTH_USER'] && $result->fetch_assoc()['Clave']=== $_SERVER['PHP_AUTH_PW']){
  $l=true;
  $c=$result->fetch_assoc()['Codigo'];
 }}

 if($l){
    session_start();
$_SESSION=['userc'=>$_SERVER['PHP_AUTH_USER']];
    header("Location: Inicio.php");
} else die("Invalid username/password combination");

 }
 else
 {
 header('WWW-Authenticate: Basic realm="Restricted Area"');
 header('HTTP/1.0 401 Unauthorized');
 die ("Please enter your username and password");
 }
?>
</body>
</html>