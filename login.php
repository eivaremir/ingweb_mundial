<?php

include("layout/root.php");
include("queries/dbcon.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST["email"]) | !isset($_POST["pwd"])) {
        echo "please enter both email and password";
    } else {
        // consultar valores en base de datos
        $query = "SELECT email FROM user where email ='" . $_POST["email"] . "' and password ='" . $_POST["pwd"] . "'";
        $cursor = $con_bd->query($query);
        $rows = mysqli_fetch_all($cursor, MYSQLI_ASSOC);


        if (count($rows) == 1) {
            session_start();
            $_SESSION["email"] = $_POST["email"];
            header("location:index.php");

        } else {
            echo "Invalid credentials";
        }
        //echo "session user is ". $_SESSION["email"];
    }
}

if (!empty($_SESSION["email"])) {
    echo "
        <a href='logout.php'>log out</a>
    ";
}

include("alerts.php");
?>
<form action='login.php' method='POST' align="center">
    <img src="assets/Person.png" alt="user"> <br>
    <input type="text" name="email" placeholder="Correo" class="type">
    <br>
    <input name='pwd' type="password" placeholder="Contraseña" class="type">
    <br>
    <button id="botones">Login</button>
</form>
<?php
include("layout/root2.php");
?>
<!--
//session_unset();
//echo "session user is ". $_SESSION["user"];
-->