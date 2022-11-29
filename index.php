<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inicio</title>
    <?php include("layout/head.php") ?>
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
                    <span id="styleSpan">' . $USER["name"] . '</span>
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
    echo "<h1 id=welcome>Welcome, " . $_SESSION["email"] . "</h1>";
    ;
}



//include("layout/root2.php")
