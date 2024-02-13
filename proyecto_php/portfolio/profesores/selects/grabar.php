<?php 
var_dump($_POST);
$day1 = strtotime($_POST["date1"]);
$day1 = date('Y-m-d H:i:s', $day1)

?>