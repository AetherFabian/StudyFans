<?php
  session_start();

  include 'SQL/database.php';
  /*$mysqli = new conexion();
  $mysqli = $mysqli->conn();*/

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare("SELECT id_user, firstname_user, mail_user, pass_user 
                                FROM tb_users WHERE id_user = :id");
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <!--<link rel="stylesheet" href="assets/css/estilos.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
<body>
    <?php if(!empty($user)): ?>

      <section>
        <article>
          <h1>Bienvenido <?= $user['firstname_user']; ?>!</h1>
          <p></p>
          <p></p>
        </article>
      </section>

    <!--<footer>
        <p style="text-align:center;"><strong>Derechos reservados Samsara 2019. </strong></p>
      </footer>-->

    <?php else: ?>
      <h1>Por favor ingrese su cuenta o registrese </h1>

      <a href="login.php">Iniciar sesion</a> o
      <a href="signup.php">Registro</a>
    <?php endif; ?>
</body>
</html>
