<?php
include('layout/root.php');
include('queries/dbcon.php');
?>
<h1>HOLA</h1>
<?php
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
<?php
include('layout/root2.php');
?>