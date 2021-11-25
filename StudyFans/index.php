<?php
  require 'session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
<body>
    <?php if(!empty($id)): ?>

      <section>
        <article>
          <h1>Bienvenido <?= $id['firstname_user']; ?>!</h1><br>
          <p> <a class="link" href="uploadvideo.php">Subir Video</a></p><br>
          <p> <a class="link" href="logout.php">Logout</a></p><br>
        </article>
      </section>

    <?php else: ?>
      <h1>Por favor ingrese su cuenta o registrese </h1>

      <a href="login.php">Iniciar sesion</a> o
      <a href="signup.php">Registro</a>
    <?php endif; ?>
</body>
</html>
