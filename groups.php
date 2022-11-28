<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbol</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
    </style>
</head>

<body>
    <h1>Grupo A</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'A'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo B</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'B'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo C</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'C'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo D</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'D'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo E</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'E'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo F</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'F'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo G</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'G'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
    <h1>Grupo H</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Juegos Jugados</th>
            <th>Juegos Ganados</th>
            <th>Juegos Empatados</th>
            <th>Juegos Perdidos</th>
            <th>Goles en Contra</th>
            <th>Goles a Favor</th>
            <th>Diferencia de Goles</th>
            <th>Puntos</th>
        </tr>
        <?php
        include('queries/dbcon.php');

            $sql = "SELECT * FROM group_statistics WHERE group_statistics.GROUP = 'H'";
            $result = $con_bd -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["code"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["JJ"]."</td>";
                    echo "<td>".$row["JG"]."</td>";
                    echo "<td>".$row["JE"]."</td>";
                    echo "<td>".$row["JP"]."</td>";
                    echo "<td>".$row["GC"]."</td>";
                    echo "<td>".$row["GF"]."</td>";
                    echo "<td>".$row["DF"]."</td>";
                    echo "<td>".$row["PTS"]."</td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
    <br><br>
</body>

</html>