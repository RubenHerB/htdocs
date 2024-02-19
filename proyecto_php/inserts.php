<?php
$nombres=[
    ['Adriana', 'González García', 'adrianagonzalez', '1990-05-15'],
    ['Carlos', 'Martínez López', 'carlosmartinez', '1988-08-22'],
    ['Laura', 'Rodríguez Hernández', 'laurarodriguez', '1995-02-10'],
    ['David', 'Fernández Pérez', 'davidfernandez', '1992-11-30'],
    ['Ana', 'López Gómez', 'analopez', '1987-07-03'],
    ['José', 'Martín Rodríguez', 'josemartin', '1998-09-18'],
    ['María', 'Hernández Martínez', 'mariahernandez', '1991-04-25'],
    ['Juan', 'Pérez Sánchez', 'juanperez', '1994-12-07'],
    ['Sandra', 'García Martín', 'sandragarcia', '1996-06-14'],
    ['Javier', 'Sánchez Pérez', 'javiersanchez', '1989-03-28'],
    ['Elena', 'Gómez López', 'elenagomez', '1993-10-05'],
    ['Miguel', 'Rodríguez Fernández', 'miguelrodriguez', '1997-01-20'],
    ['Patricia', 'López García', 'patricialopez', '1990-08-11'],
    ['Daniel', 'Martínez Sánchez', 'danielmartinez', '1998-07-01'],
    ['Carmen', 'García Fernández', 'carmengarcia', '1994-05-03'],
    ['Pedro', 'Gómez Martínez', 'pedrogomez', '1986-09-09'],
    ['Lucía', 'Fernández López', 'luciafernandez', '1995-11-28'],
    ['Alejandro', 'Pérez González', 'alejandroperez', '1987-04-17'],
    ['Sara', 'Martín Hernández', 'saramartin', '1992-02-14'],
    ['Raúl', 'Sánchez Gómez', 'raulsanchez', '1993-06-21'],
    ['María José', 'González Hernández', 'mariajosegonzalez', '1997-12-04'],
    ['Andrea', 'Martínez Gómez', 'andreamartinez', '1990-10-30'],
    ['Jorge', 'García Sánchez', 'jorgegarcia', '1996-09-12'],
    ['Rocío', 'Gómez Fernández', 'rociogomez', '1999-04-08'],
    ['Fernando', 'Hernández Pérez', 'fernandohernandez', '1988-07-17'],
    ['Natalia', 'Sánchez Martínez', 'nataliasanchez', '1994-03-05'],
    ['Roberto', 'Pérez García', 'robertoperez', '1991-08-26'],
    ['Eva', 'Martínez Fernández', 'evamartinez', '1993-01-02'],
    ['Óscar', 'García López', 'oscargarcia', '1997-10-19'],
    ['Isabel', 'López Martínez', 'isabellopez', '1985-12-23'],
    ['Diego', 'Martín González', 'diegomartin', '1998-11-07'],
    ['Marina', 'Fernández Gómez', 'marinafernandez', '1996-07-16'],
    ['Alberto', 'González López', 'albertogonzalez', '1992-05-29'],
    ['Paula', 'Hernández García', 'paulahernandez', '1989-09-03'],
    ['Roberto Carlos', 'García Pérez', 'robertocarlos', '1990-02-27'],
    ['Elena María', 'Martínez López', 'elenamariamartinez', '1993-06-24'],
    ['Manuel', 'Sánchez Fernández', 'manuelsanchez', '1997-04-13'],
    ['Nuria', 'Gómez González', 'nuriagomez', '1986-11-10'],
    ['Iván', 'García Martínez', 'ivangarcia', '1995-08-01'],
    ['Cristina', 'López Hernández', 'cristinalopez', '1999-03-09'],
    ['Jesús', 'Martínez García', 'jesusmartinez', '1991-07-28'],
    ['Ana María', 'González López', 'anamariagonzalez', '1994-10-15'],
    ['Marta', 'Gómez Martín', 'martagomez', '1998-12-20'],
    ['Roberto Carlos', 'González García', 'robertocarlos', '1996-05-17'],
    ['Sonia', 'Hernández Sánchez', 'soniahernandez', '1992-09-06'],
    ['Pablo', 'Sánchez Gómez', 'pablosanchez', '1991-11-23'],
    ['Nerea', 'Martínez Hernández', 'nereamartinez', '1999-08-04'],
    ['Juan Carlos', 'García Martínez', 'juancarlosgarcia', '1997-01-31'],
    ['Elena María', 'Sánchez García', 'elenamariasanchez', '1987-03-14'],
    ['Óscar', 'Gómez Hernández', 'oscargomez', '1993-02-16'],
    ['Sandra María', 'Martínez Sánchez', 'sandramariamartinez', '1995-04-29'],
    ['Manuel', 'García Gómez', 'manuelgarcia', '1989-10-07'],
    ['Lucía María', 'Martínez Hernández', 'luciamariamartinez', '1998-07-26'],
    ['Marcos', 'Gómez Sánchez', 'marcosgomez', '1996-09-11'],
    ['Paula María', 'García Martínez', 'paulamariagarcia', '1994-08-18'],
    ['Adrián', 'González Hernández', 'adriangonzalez', '1988-12-25'],
    ['Marta María', 'Sánchez Gómez', 'martamariasanchez', '1992-11-04']];

    include "portfolio/login.php";
    $connection = new mysqli('localhost', 'root','', 'incidencias');
    if ($connection->connect_error) die("Fatal Error");
    foreach ($nombres as $n) {
        $query ="";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
    }
    ?>