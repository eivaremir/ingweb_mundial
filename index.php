<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="webStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <div class="top">
        <div><h1 id="titlePage">QATAR 2022</h1></div>
        <div>
            <a href="login.php" id="button">Ingresar</a>
            <a href="register.php" id="button2">Registrarse</a>
        </div>
    </div>
    <div class="bottom">
        <div class="dashButton">
            Resultados
        </div>
        <div class="dashButton">
        </div>
        <div class="dashButton">
        </div>
        <div class="dashBut"></div>
        <div class="dashBut"></div>
    </div>
</body>
</html>
<?php

//session_start();
include("queries/user_data.php");

//include("layout/root.php");


if($USER){
    echo "
        <a href='logout.php'>log out</a><br>
    ";
    echo "<h1>Welcome, ".$_SESSION["email"] ."</h1>";
}
else {
    echo "
    <a href='login.php'>log in</a>
";
}


//include("layout/root2.php")


