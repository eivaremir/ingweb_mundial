<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layout/head.php") ?>
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
    <?php
include("layout/navbar.php");
Navbar("Clasificación", "index.php");
?>
    <?php
    include('queries/dbcon.php');
    $query = "SELECT * FROM `group` group by id order by id ;";
    $cursor = $con_bd->query($query);
    $groups = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
    foreach ($groups as $group) {
        echo "
        <h1>Grupo " . $group["id"] . "</h1>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>JJ</th>
                <th>JG</th>
                <th>JE</th>
                <th>JP</th>
                <th>GC</th>
                <th>GF</th>
                <th>DF</th>
                <th>PTS</th>
            </tr>
        ";
        $sql = "SELECT * FROM group_statistics WHERE `GROUP` = '" . $group["id"] . "' order by pts desc;";
        $result = $con_bd->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["code"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["JJ"] . "</td>";
                echo "<td>" . $row["JG"] . "</td>";
                echo "<td>" . $row["JE"] . "</td>";
                echo "<td>" . $row["JP"] . "</td>";
                echo "<td>" . $row["GC"] . "</td>";
                echo "<td>" . $row["GF"] . "</td>";
                echo "<td>" . $row["DF"] . "</td>";
                echo "<td>" . $row["PTS"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    ?>

</body>

</html>