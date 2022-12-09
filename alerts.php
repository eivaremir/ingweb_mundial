<?php

if(isset($_GET["error"])){
    echo "<div id='error-alert' style='padding: 10px 7px;background: rgba(250,0,0,.2);border-radius: 10px;border: 1px solid red;margin: 5px 7px;'>";
    if ($_GET["error"] == "invalid_credentials") echo "correo o contraseña invalidos";
    if ($_GET["error"] == "incomplete_input") echo "Por favor llena todos los campos";
    if ($_GET["error"] == "password_length") echo "La contraseña debe tener un mínimo de 8 caracteres";
    if ($_GET["error"] == "invalid_email_format") echo "Formato de email incorrecto";
    if ($_GET["error"] == "passwords_mismatch") echo "Las contraseñas no coinciden";
    if ($_GET["error"] == "dberror") echo "Ocurrió un error, intente de nuevo más tarde. ";
    if ($_GET["error"] == "min_acc_balance") echo "Your account can't have less than $100 in balance";
    
    if (isset($_GET["content"])){
        echo $_GET["content"];
    }
    echo "</div>";
    
}
if(isset($_GET["result"])){
    echo "<div id='success-alert' style='padding: 10px 7px;background: rgba(0,250,0,.2);border-radius: 10px;border: 1px solid green;margin: 5px 7px;'>";
    if ($_GET["result"] == "user_registered") echo "Usuario registrado, por favor ingrese sus datos ahora";
    echo "</div>";
    
}