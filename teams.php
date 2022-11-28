<?php
include('queries/dbcon.php');

    $sql = "SELECT * FROM team";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        echo "<ol>";
        while($row = $result -> fetch_assoc()){
            echo "<li><a href=team.php?code=".$row["code"].">" .$row["name"]. "</a></li>";
         }
         echo "</ol>";
    }
?>