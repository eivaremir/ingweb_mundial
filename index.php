<?php

//session_start();
include("queries/user_data.php");


if($USER){
    echo "
        <a href='logout.php'>log out</a><br>
    ";
    echo "<h1>Welcome, ".$_SESSION["email"] ."</h1>";
}
else {
    echo "
    <a href='login.php'>log in</a>
";
}




