<?php
include('queries/dbcon.php');

$codigo=$_GET['code'];
echo htmlspecialchars($codigo);
echo "<br>";

    $sql = "SELECT * FROM team";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            if ($codigo == $row['code']){
                $id = $row["id"];
                echo $row["name"]. "<br><br>";
            }
         }
    }

$sql = "SELECT * FROM team_match inner join team on team_match.team = team.id where team.code= '$codigo'";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo "Juego:" .$row["match"]. "<br>";
            echo "Goles:" .$row["goals"]. "<br><br>";
         }
    }

    $sql = "SELECT * FROM player";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        echo "<ol>";
        while($row = $result -> fetch_assoc()){
            if($id== $row['team']){
                echo "<li>" .$row["name"]. "</li>";
            }
         }
         echo "</ol>";
    }

?>