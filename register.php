<?php
include("queries/dbcon.php");


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email=trim($_POST["email"]);
    $name=trim($_POST["name"]);
    $pwd=trim($_POST["pwd"]);
    $pwd2=trim($_POST["pwd2"]);
    if(""==$email | ""==$pwd| ""==$pwd2| ""==$name){
        
        header('location:register.php?error=incomplete_input');
        //echo "";
    }
    elseif($pwd !=$pwd2){
        header('location:register.php?error=passwords_mismatch');
    }
    else{
        $insert_user_query = "insert into user (name,email,password) values ('".$name."','". $email . "','".$pwd . "');";
        try {
            if($con_bd->query($insert_user_query)){
                header("location:login.php?result=user_registered");
            }
            else{
                header("location:create_transaction.php?error=dberror&content=".$con_bd->error);
            }
        }catch(Exception $e){
            header("location:register.php?error=dberror&content=".$con_bd->error);
        }
    }

    
}

include("alerts.php");
    echo "
        <form action='register.php' method='POST'>
            <label for='email'>Correo </label>
            <input name='email'>
            <label for='name'>Nombre</label>
            <input name='name'>
            <label for='pwd'>Contraseña</label>
            <input name='pwd'>
            <label for='pwd2'>Repetir contraseña</label>
            <input name='pwd2'>
            <button>Registrarse</button>
        </form>
        ";