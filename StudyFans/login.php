<?php

  include('SQL/database.php');
  session_start();

if (isset($_POST['login'])) {
  $email = $_POST['mail_user'];
  $pass = $_POST['password'];

  
    $records = $conn->prepare('SELECT id_user, mail_user, pass_user FROM tb_users WHERE mail_user = :email');
    $records->bindParam('email', $email, PDO::PARAM_STR);
    $records->execute();
  
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (!$results) {
      echo "Tas bien puñetas";
    } else {
      if (password_verify($pass, $result['pass_user'])) {
         $_SESSION['user_id'] = $results['id_user'];
          header("Location: /StudyFans");
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>
    <?php //require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST" class="formulario" >
        <h1>Login</h1>
            <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="mail_user" placeholder="Email">
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="pass" placeholder="Password">
            </div>
            <input type="submit" value="Login" class="button">
            <p>¿You dont have an account? <a class="link" href="signup.php">Sign up </a></p>
        </div>
    </form>
    <p> <a class="link" href="logout.php">Logout</a></p>
</body>

</html>
