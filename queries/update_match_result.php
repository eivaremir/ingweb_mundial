<?php

include("dbcon.php");

$result_id = $_GET["id"];
$new_value = $_GET["value"];

$update_goals_query = "update team_match set goals = " . $new_value . " where id=" . $result_id . ";";
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