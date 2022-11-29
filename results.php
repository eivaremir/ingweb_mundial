<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resultados</title>
    <?php include("layout/head.php") ?>
</head>

<body>

    <?php
    include("queries/user_data.php");

    echo "<div class='matches'>";
    $query = "SELECT * FROM football_match  order by date;";
    $cursor = $con_bd->query($query);
    $matches = mysqli_fetch_all($cursor, MYSQLI_ASSOC);

    foreach ($matches as $match) {
        $query = "SELECT team_match.*,team.code,team.name FROM team_match inner join team on team_match.team = team.id where `match`=" . $match["id"] . " order by id;";
        //echo $query;
        $cursor = $con_bd->query($query);
        $result = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
        $contentEditable = "";

        if ($USER["is_admin"]) {
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
    echo "</div>";

    ?>

    <?php include("assets/notifications.php") ?>
    <script>
        document.querySelectorAll(".result-score").forEach(score => {
            score.addEventListener("input", (e) => {
                let value = e.target.innerText

                if (parseInt(value) || value === "0") {
                    fetch(`http://localhost/php/semestral/queries/update_match_result.php?id=${e.target.dataset.id}&value=${e.target.innerText}`)
                        .then(r => r.json())
                        .then(r => {
                            if (r.result == "success") {
                                showNotification('success', 'Success!', 'Your request was completed successfully.')
                            }
                            else {
                                showNotification('error', 'Failed operation', r.result);
                            }
                        })
                }

            })
        })
    </script>
</body>

</html>