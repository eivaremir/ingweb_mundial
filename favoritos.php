<!DOCTYPE html>
<html lang="en">

<head>
    <title>Favorito</title>
    <?php include("layout/head.php") ?>
</head>

<body>

    <?php
    include("queries/user_data.php");

    $sql = "SELECT * FROM user";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $favorito= $row['favorite_team'];
            
            $sql = "SELECT * FROM team";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    if ($favorito == $row['id']){
                        echo $row["name"]. "<br>";
                        echo $row["code"]. "<br><br>";
                    }
                }
            }
         }
    }

    $sql = "SELECT * FROM team_match";
    $result = $con_bd -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            if($favorito == $row["team"]){
                $partido=$row["match"];
                juegos($partido); 
            }
         }
    }

    function juegos($partido){
    include("queries/user_data.php");

    echo "<div class='matches'>";
    $query = "SELECT * FROM football_match  order by date;";
    $cursor = $con_bd->query($query);
    $matches = mysqli_fetch_all($cursor, MYSQLI_ASSOC);

    foreach ($matches as $match) {
        $query = "SELECT team_match.*,team.code,team.name FROM team_match inner join team on team_match.team = team.id where `match`=" . $partido . " order by id;";
        //echo $query;
        $cursor = $con_bd->query($query);
        $result = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
        $contentEditable = "";

        if ($USER && $USER["is_admin"]) {
            $contentEditable = "contentEditable";
        }
        echo "
            <div class='match-container'>
            <div class='match-result'>
                
                <div class='result-country'>
                    <div class='flag' style='background-image: url(https://cloudinary.fifa.com/api/v3/picture/flags-sq-2/" . $result[0]["code"] . "?tx=c_fill,g_auto,q_auto,w_70,h_46)'></div>
                    <div class='name'>" . $result[0]["code"] . "</div>
                </div>
                <div class='result-score' data-id='" . $result[0]["id"] . "' " . $contentEditable . ">" . $result[0]["goals"] . "</div>
                <span>VS</span>
                <div class='result-score' data-id='" . $result[1]["id"] . "' " . $contentEditable . ">" . $result[1]["goals"] . "</div>
                <div class='result-country'>
                <div class='flag' style='background-image: url(https://cloudinary.fifa.com/api/v3/picture/flags-sq-2/" . $result[1]["code"] . "?tx=c_fill,g_auto,q_auto,w_70,h_46)'></div>
                    <div class='name'>" . $result[1]["code"] . "</div>
                </div>
            </div>
            <div class='match-footer'>
            " . $match["date"] . "(UTC-5)
            </div>
            </div>
        ";

    }
}
    echo "</div>";

    ?>
    <?php include("assets/notifications.php") ?>
</body>

</html>