<?php

if(isset($_GET["error"])){
    echo "<div style='padding: 10px 7px;background: rgba(250,0,0,.2);border-radius: 10px;border: 1px solid red;margin: 5px 7px;'>";
    if ($_GET["error"] == "incomplete_input") echo "Por favor llena todos los campos";
    if ($_GET["error"] == "passwords_mismatch") echo "Las contraseñas no coinciden";
    if ($_GET["error"] == "dberror") echo "Ocurrió un error, intente de nuevo más tarde";
    if ($_GET["error"] == "min_acc_balance") echo "Your account can't have less than $100 in balance";
    echo "</div>";
    
}
if(isset($_GET["result"])){
    echo "<div style='padding: 10px 7px;background: rgba(0,250,0,.2);border-radius: 10px;border: 1px solid green;margin: 5px 7px;'>";
    if ($_GET["result"] == "user_registered") echo "Usuario registrado, por favor ingrese sus datos ahora";
    echo "</div>";
    
}