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


$hn = 'localhost';
$db = 'bdsimon';
$un = 'username';
$pw = 'password';




    $uspw=['admin'=>'letmein','user'=>'user','Ruben'=>'1234'];





 if (isset($_SERVER['PHP_AUTH_USER']) &&
 isset($_SERVER['PHP_AUTH_PW']))
 {
 if ($uspw[$_SERVER['PHP_AUTH_USER']] === $_SERVER['PHP_AUTH_PW']){
    session_start();
$_SESSION=['user'=>$_SERVER['PHP_AUTH_USER']];
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