<?php
include("queries/dbcon.php");
$query = "SELECT * FROM football_match  order by date;";
$cursor = $con_bd->query($query);
$matches = mysqli_fetch_all($cursor, MYSQLI_ASSOC);

$arr = array();

foreach ($matches as $match) {

    $query = "SELECT team_match.*,team.code,team.name FROM team_match inner join team on team_match.team = team.id where `match`=" . $match["id"] . " order by id;";



    //echo $query;
    $cursor = $con_bd->query($query);
    $result = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
    $contentEditable = "";

    array_push($arr, $result);
}

echo json_encode($arr);