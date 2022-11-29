<?php

include("user_data.php");

$team = $_GET["team"];
$origin = $_GET["origin"];


$update_goals_query = "update user set favorite_team = " . $team . " where id=" . $USER["id"] . ";";
try {
    if ($con_bd->query($update_goals_query)) {
        echo '
            { "result":"success"}
        ';
    } else {
        echo '
        { "result":"' . $con_bd->error . '"}
    ';
    }
} catch (Exception $e) {
    echo '
        { "result":"' . $con_bd->error . '"}
    ';
}
header("location:../" . $origin . ".php");