<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookies</title>
</head>
<body>
<?php
if(isset($_COOKIE('color'))){
    if(isset($_POST['col'])){
        setcookie('color', $_POST['col']);
    }
}else{
    if(isset($_POST['col'])){
    setcookie('color', $_POST['col'], time()+600, '/', '127.0.0.1', FALSE, FALSE);
}}
?>
</body>
</html>