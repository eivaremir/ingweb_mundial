<!DOCTYPE html>
<html lang="en">

<head>
    <title>Equipos</title>
    <link rel="stylesheet" href="brackets.css">
    <?php include("layout/head.php") ?>
</head>

<body>
    <?php
    include("layout/navbar.php");
    Navbar("Clasificación", "index.php");
    ?>
    <section>

        <div class='tournament'>
            <?php
            include("queries/dbcon.php");
            $groups = array(
                "A" => array([]),
                "B" => array([]),
                "C" => array([]),
                "D" => array([]),
                "E" => array([]),
                "F" => array([]),
                "G" => array([]),
                "H" => array([]),
            );


            foreach ($groups as $group => $pos) {
                $query = "select * from group_statistics where `GROUP`='" . $group . "' LIMIT 2";
                $cursor = $con_bd->query($query);
                $gr = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
                $groups[$group] = array($gr[0]["name"], $gr[1]["name"]);
            }

            echo "
            <ul class='round round-2'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'>" . $groups["A"][0] . "</li>
                <li class='game-left spacer'>&nbsp;</li>
                <li class='game-left game-bottom'>" . $groups["B"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'>" . $groups["C"][0] . "</li>
                <li class='game-left spacer'>&nbsp;</li>
                <li class='game-left game-bottom'>" . $groups["D"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'>" . $groups["E"][0] . "</li>
                <li class='game-left spacer'>&nbsp;</li>
                <li class='game-left game-bottom'>" . $groups["F"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'>" . $groups["G"][0] . "</li>
                <li class='game-left spacer'>&nbsp;</li>
                <li class='game-left game-bottom'>" . $groups["H"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round round-3'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'></li>
                <li class='game-left spacer region region-right'></li>
                <li class='game-left game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'></li>
                <li class='game-left spacer region region-right'></li>
                <li class='game-left game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round round-4'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'></li>
                <li class='game-left spacer'>&nbsp;</li>
                <li class='game-left game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round semi-final'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-left game-top'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round finals'>
                <li class='spacer'>&nbsp;</li>
                <li class='game final'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round semi-final'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round round-4'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'></li>
                <li class='game-right spacer'>&nbsp;</li>
                <li class='game-right game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round round-3'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'></li>
                <li class='game-right spacer region region-left'></li>
                <li class='game-right game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'></li>
                <li class='game-right spacer region region-left'></li>
                <li class='game-right game-bottom'></li>
                <li class='spacer'>&nbsp;</li>
            </ul>
            <ul class='round round-2'>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'>" . $groups["B"][0] . "</li>
                <li class='game-right spacer'>&nbsp;</li>
                <li class='game-right game-bottom'>" . $groups["A"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'>" . $groups["D"][0] . "</li>
                <li class='game-right spacer'>&nbsp;</li>
                <li class='game-right game-bottom'>" . $groups["C"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'>" . $groups["F"][0] . "</li>
                <li class='game-right spacer'>&nbsp;</li>
                <li class='game-right game-bottom'>" . $groups["E"][1] . "</li>
                <li class='spacer'>&nbsp;</li>
                <li class='game-right game-top'>" . $groups["H"][0] . "</li>
                <li class='game-right spacer'>&nbsp;</li>
                <li class='game-right game-bottom'>" . $groups["G"][0] . "</li>
                <li class='spacer'>&nbsp;</li>
            </ul>
        </div>
    </section>
</body>

</html>"
                ?>