<?php
$connection = new mysqli('localhost', "root", "", 'consultas');
    
if ($connection->connect_error) die("Fatal Error");
