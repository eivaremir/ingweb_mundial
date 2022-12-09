<?php
include("queries/dbcon.php");
include("layout/root.php");

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
    elseif (strlen($pwd) < 8) {
        header('location:register.php?error=password_length');
    }
    elseif (!preg_match("/^[\w\-\.]++@([\w\-]+\.)+[\w\-]{2,4}$/i",$email)){
        
        header('location:register.php?error=invalid_email_format');
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


?>
        <form action='register.php' method='POST' align="center">
            <img src="assets/Add-Person.png" alt="registrar"> <br>
            <input 
            name='email'
            type="text" 
            placeholder="Correo"
            class = "type"
            >
            <br>
            <input 
            name='name'
            type="text" 
            placeholder="Nombre completo"
            class = "type"
            >
            <br>
            <input 
            name='pwd'
            type="password" 
            placeholder="Contraseña"
            class = "type"
            >
            <br>
            <input 
            name='pwd2'
            type="password" 
            placeholder="Repetir contraseña"
            class = "type"
            >
            <br>
            <button id="botones">Registrarse</button>
        </form>
<?php
include("layout/root2.php");
?>