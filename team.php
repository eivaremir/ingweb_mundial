<!DOCTYPE html>
<html lang="en">

<head>
    <title>Equipos</title>
    <?php include("layout/head.php") ?>
</head>

<body>

    <?php
    include('queries/dbcon.php');
    include("layout/navbar.php");


    $codigo = $_GET['code'];


    $sql = "SELECT * FROM team";
    $result = $con_bd->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($codigo == $row['code']) {
                $nombre = $row["name"];
                $id = $row["id"];
                $name = $row["name"];


            }
        }
    }

    Navbar($name, "teams.php");

    $sql = "SELECT * FROM team";
    $result = $con_bd->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($codigo == $row['code']) {

                echo "

                <div class='team-details-container'>
                    <div class='team-summary'>
                    <div class='team-flag' style='background-image:url(https://cloudinary.fifa.com/api/v3/picture/flags-sq-2/" . $row["code"] . "?tx=c_fill,g_auto,q_auto,w_1000,h_650)'></div> 
                    <h2>" . $row["code"] . "</h2>
                    <h3>" . $row["name"] . "</h3>
                    </div>
                    <div class='team-quote'>
                    <h2>Logros</h2>
                        " . $row["achivements"] . "
                    </div>
                
                
                ";


            }
        }
    }

    // $sql = "SELECT * FROM team_match inner join team on team_match.team = team.id where team.code= '$codigo'";
    // $result = $con_bd->query($sql);
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "Juego:" . $row["match"] . "<br>";
    //         echo "Equipo:" . $nombre . "<br>";
    //         echo "Goles:" . $row["goals"] . "<br>";
    //         $equipo = $row["team"];
    //         $juego = $row["match"];
    //         enemigo($equipo, $juego);
    //     }
    // }
    
    function enemigo($equipo, $juego)
    {
        include('queries/dbcon.php');

        $sql = "SELECT * FROM team_match";
        $result = $con_bd->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($juego == $row['match'] && $equipo != $row['team']) {
                    $gol = $row["goals"];
                    $enemigo = $row["team"];

                    $sql = "SELECT * FROM team";
                    $result = $con_bd->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($enemigo == $row['id']) {
                                echo "Contrincantes:" . $row["name"] . "<br>";
                                echo "Goles del contrincante:" . $gol . "<br><br>";
                            }
                        }
                    }
                }
            }
        }
    }



    $sql = "SELECT * FROM player";
    $result = $con_bd->query($sql);
    if ($result->num_rows > 0) {
        echo "<div>";
        echo "<h2>Jugadores</h2>";
        echo "<ol>";
        while ($row = $result->fetch_assoc()) {
            if ($id == $row['team']) {
                echo "<li>" . $row["name"] . "</li>";
            }
        }
        echo "</ol>";
        echo "</div>";
    }

    echo "</div>"

        ?>

</body>

</html>