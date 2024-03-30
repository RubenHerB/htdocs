<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
    ?>
<h1 style="background-color:yellow; text-align:center;padding:15px"><?php echo $_SESSION['user']['tipo']; ?></h1>
</body>
</html>
