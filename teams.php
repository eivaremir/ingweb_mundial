<!DOCTYPE html>
<html lang="en">
<head>
    <title>Equipos</title>
    <?php include("layout/head.php")?>
</head>


<?php
include('queries/dbcon.php');
?>
<div class="top">
    <a href="index.php"><img src="assets/arrowback.png" alt="arrow" id="arrow"> </a>
    <div><h1 id="titlePage">Equipos</h1></div>
</div>

<?php
    $sql = "SELECT * FROM team";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        echo "<div class=teamsDad>";
        while($row = $result -> fetch_assoc()){
            echo "<div class=teamsSon>";
            echo "<a id=linkfont href=team.php?code=".$row["code"]."> <img src=https://cloudinary.fifa.com/api/v3/picture/flags-sq-2/".$row["code"]."?tx=c_fill,g_auto,q_auto,w_70,h_46><br>" .$row["name"]. "</a> 
            <img id='starImage' src='assets/Star.png' name=".$row["code"]." onclick=changeImage()></div>";
         }
        echo "</div>";
        echo "
        <script>
            function changeImage(){
                let displayImage = document.getElementById('starImage');
                let name = displayImage.name;
                if (displayImage.name.match(name)){
                    if(displayImage.src.match('assets/Star.png')){
                        displayImage.src = 'assets/Star2.png';
                    } else {
                        displayImage.src = 'assets/Star.png';
                    }
                }
            } 
        </script>
        ";
    }
?>
<?php
include('layout/root2.php');
?>