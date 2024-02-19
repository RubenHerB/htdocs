<?php
$nombres=[
    ["Lucía", "García López", "lucia.garcia", "1990-07-15"],
    ["Daniel", "Martínez Pérez", "daniel.martinez", "1988-04-20"],
    ["Sofía", "Rodríguez Gómez", "sofia.rodriguez", "1995-11-10"],
    ["Carlos", "López Martínez", "carlos.lopez", "2000-03-25"],
    ["Laura", "Gómez Sánchez", "laura.gomez", "1987-09-30"],
    ["Alejandro", "Pérez Rodríguez", "alejandro.perez", "1992-02-05"],
    ["María", "González Martínez", "maria.gonzalez", "1998-12-12"],
    ["Javier", "Martínez Gómez", "javier.martinez", "1991-04-18"],
    ["Elena", "Sánchez Rodríguez", "elena.sanchez", "1989-08-23"],
    ["Miguel", "López García", "miguel.lopez", "1996-06-08"],
    ["Ana", "García Pérez", "ana.garcia", "2003-10-05"],
    ["Pedro", "Gómez Martínez", "pedro.gomez", "1986-01-01"],
    ["Clara", "Martínez López", "clara.martinez", "1993-07-17"],
    ["Diego", "Gómez Rodríguez", "diego.gomez", "1997-09-02"],
    ["Paula", "Pérez López", "paula.perez", "2002-11-28"],
    ["Sara", "Rodríguez Martínez", "sara.rodriguez", "1985-12-24"],
    ["Jorge", "González Pérez", "jorge.gonzalez", "1994-02-14"],
    ["Isabel", "López Rodríguez", "isabel.lopez", "1999-06-30"],
    ["Roberto", "Gómez Martínez", "roberto.gomez", "1992-04-03"],
    ["Natalia", "García Sánchez", "natalia.garcia", "1986-08-19"],
    ["Raúl", "Sánchez Gómez", "raul.sanchez", "1990-10-09"],
    ["Inés", "Martínez Rodríguez", "ines.martinez", "1996-11-05"],
    ["Hugo", "Gómez López", "hugo.gomez", "2001-01-30"],
    ["Valentina", "Rodríguez Pérez", "valentina.rodriguez", "1997-03-12"],
    ["Gabriel", "Pérez García", "gabriel.perez", "1988-05-27"],
    ["Julia", "García Martínez", "julia.garcia", "1995-07-23"],
    ["Francisco", "López Rodríguez", "francisco.lopez", "2004-09-10"],
    ["Aurora", "Gómez Sánchez", "aurora.gomez", "1987-12-15"],
    ["Marcos", "González Martínez", "marcos.gonzalez", "1993-02-28"],
    ["Victoria", "Martínez Pérez", "victoria.martinez", "1998-04-16"],
    ["Luis", "Pérez Gómez", "luis.perez", "2000-06-21"],
    ["Eva", "García Rodríguez", "eva.garcia", "1991-08-07"],
    ["Pablo", "Sánchez Pérez", "pablo.sanchez", "1999-10-03"],
    ["Olivia", "Martínez Gómez", "olivia.martinez", "1994-12-29"],
    ["Manuel", "Gómez Rodríguez", "manuel.gomez", "1989-02-25"],
    ["Elena", "López Martínez", "elena.lopez", "1996-04-11"],
    ["Sergio", "Rodríguez García", "sergio.rodriguez", "2003-06-26"],
    ["Marina", "García Pérez", "marina.garcia", "1986-08-22"],
    ["Javier", "Sánchez Rodríguez", "javier.sanchez", "1992-10-18"],
    ["Lucía", "Martínez Gómez", "lucia.martinez", "1998-12-14"],
    ["Andrés", "Gómez Pérez", "andres.gomez", "2004-02-09"],
    ["Carolina", "Pérez García", "carolina.perez", "1987-04-05"],
    ["Álvaro", "García Martínez", "alvaro.garcia", "1993-06-01"],
    ["Alicia", "Martínez López", "alicia.martinez", "2001-08-27"],
    ["Mateo", "López Rodríguez", "mateo.lopez", "1995-10-24"],
    ["Valeria", "Gómez Martínez", "valeria.gomez", "1999-12-20"],
    ["Diego", "Sánchez López", "diego.sanchez", "1990-02-15"],
    ["Martina", "García Rodríguez", "martina.garcia", "1997-04-11"],
    ["Hugo", "Pérez Gómez", "hugo.perez", "2005-06-17"]
  ];

    include "portfolio/login.php";
    $connection = new mysqli('localhost', 'root','', 'incidencias');
    if ($connection->connect_error) die("Fatal Error");
    foreach ($nombres as $n) {
        $query ="INSERT INTO alumno (Nombre,Apellidos,Mail,Contra,Nacimiento,LastLog) VALUES ('".$n[0]."', '".$n[1]."','".$n[2]."@alumno.cifp','".password_hash($n[2], PASSWORD_DEFAULT)."','".$n[3]."','".date('m/d/Y h:i:s', time())."')";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
    }
    ?>