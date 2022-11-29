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
        <div>
            <h1 id="titlePage">QATAR 2022</h1>
        </div>
        <div>
            <?php

            include("queries/user_data.php");

            if (!$USER) {
                echo '
                    <a href="login.php" id="button">Ingresar</a>
                    <a href="register.php" id="button2">Registrarse</a>
                ';
            } else {
                echo '
                    <span>' . $USER["name"] . '</span>
                    <a href="logout.php" id="button2">Cerrar sesión</a>
                    
                ';
            }
            ?>
        </div>
    </div>
    <div class="bottom" onmouser>
        <a href="results.php" id="linkDash">
            <div class="dashButton1">
                <h1>Resultados</h1>
            </div>
        </a>

        <a href="teams.php" id="linkDash">
            <div class="dashButton2">
                <h1>Equipos</h1>
            </div>
        </a>
        <a href="clasification.php" id="linkDash">
            <div class="dashButton3">
                <h1>Clasificación</h1>
            </div>
        </a>
        <div class="bottom">
            <a href="groups.php" id="linkDash">
                <div class="dashButton4">
                    <h1 align="center">Tabla de posiciones</h1>
                </div>
            </a>
            <a href="favoritos.php" id="linkDash">
                <div class="dashButton5">
                    <h1>Favoritos</h1>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
<?php

//session_start();


//include("layout/root.php");


if ($USER) {
    echo "<h1>Welcome, " . $_SESSION["email"] . "</h1>";
    ;
}



//include("layout/root2.php")
