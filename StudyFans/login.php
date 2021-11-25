<?php  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /StudyFans');
  }

  require 'SQL/database.php';
  if (!empty($_POST['mail_user']) && !empty($_POST['pass'])) {
    $sql='CALL `SP_login` ("'.$_POST['mail_user'].'")';
    $records = $conn->prepare($sql);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
    $count=isset($results);

    if ($count && password_verify($_POST['pass'], $results['pass_user'])) {
      $_SESSION['user_id'] = $results['id_user'];
      header("Location: /StudyFans");
    } else {
      $message = 'Lo siento, los datos no coinciden';
    }
    $idU = $_SESSION['user_id'];
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
        <p style=color:azure> <?= $message ?></p>
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
            <input type="submit" value="login" class="button">
            <p>¿You dont have an account? <a class="link" href="signup.php">Sign up </a></p>
        </div>
    </form>
    <p> <a class="link" href="logout.php">Logout</a></p>
</body>

</html>