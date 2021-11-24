<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>
    <form class="formulario" action="#" method="POST">
        <h1>Sign up</h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="fName" placeholder="First Name">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="lName" placeholder="Last Name">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="uName" placeholder="Username">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-birthday-cake icon"></i>
                <input placeholder="Birthdate" class="textbox-n" type="text" onfocus="(this.type='date')" 
                                    name="birthDt">
            </div>

            <div class="input-contenedor">
                <i class="fab fa-wpforms icon"></i>
                <input type="text" name="desc" placeholder="Descripción">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="mail" placeholder="Email">
            </div>

            <div class="input-contenedor">
                <i class="fab fa-cc-paypal icon"></i>
                <input type="text" name="paypal" placeholder="Paypal">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="pass" placeholder="Password">
            </div>

            <input type="submit" value="Sign up" class="button">
            <p>¿Do you already have an account? <a class="link" href="login.php">Login</a></p>
        </div>
    </form>
    <?php 
        require('SQL/userCRUD.php');
        $mysqli = new CRUDuser();
        if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['uName'])  
            && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['paypal'])  
            && isset($_POST['birthDt']) && isset($_POST['desc'])){
            $fName=$_POST['fName'];
            $lName=$_POST['lName'];
            $uName=$_POST['uName'];
            $mail=$_POST['mail'];
            $pass=$_POST['pass'];
            $paypal=$_POST['paypal'];
            $birthDt=$_POST['birthDt'];
            $desc=$_POST['desc'];
            $mysqli->insert($fName, $lName, $uName, $mail, $pass, $paypal, $birthDt, $desc);
        }
    ?>
</body>

</html>