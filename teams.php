<?php
include('queries/dbcon.php');

    $sql = "SELECT * FROM team";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        echo "<ol>";
        while($row = $result -> fetch_assoc()){
            echo "<li>".$row["name"]."</li>";
         }
         echo "</ol>";
    }
?>