<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
    <?php


$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");


$query = "SELECT * FROM usuarios";
 $result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 
$l=false;
$c=0;



 if (isset($_SERVER['PHP_AUTH_USER']) &&
 isset($_SERVER['PHP_AUTH_PW']))
 {
  for ($j=0; $j<$rows ; $j++){
    $result->data_seek($j); 
    $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($row['Nombre']===$_SERVER['PHP_AUTH_USER'] && $row['Clave']=== $_SERVER['PHP_AUTH_PW']){
  $l=true;
  $c=$row['Codigo'];
 }}

 $result->close();
 $connection->close(); 

 if($l){
    session_start();
$_SESSION=['user'=>$_SERVER['PHP_AUTH_USER'],'userc'=>$c];
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