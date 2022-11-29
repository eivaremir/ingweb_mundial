<?php
session_start();
include("dbcon.php");
$USER = false;

if (!empty($_SESSION["email"])) {
    $query = "SELECT * FROM user where email ='" . $_SESSION["email"] . "'";
    $cursor = $con_bd->query($query);
    $rows = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
    $client = $rows[0];
    $USER = $client;

}