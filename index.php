<?php
  require 'session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Study Fans</title>
</head>
<body>
    <?php if(!empty($id)): ?>
      
    <?php  include('partials/header.php') ?>

      <section>
        <article>
          <h1>Bienvenido <?= $id['firstname_user']; ?>!</h1><br>
          <p> Nombre: <?= $id['firstname_user']; ?></p><br>
          <p> Apellido: <?= $id['lastname_user']; ?></p><br>
          <p> Mail: <?= $id['mail_user']; ?></p><br>
          <p> Paypal: <?= $id['paypal_info']; ?></p><br>
          <p> Cumpleaños: <?= $id['dateBirth_user']; ?></p><br>
          <p> Descripción: <?= $id['profileDesc']; ?></p><br>
          <p> <a class="link" href="edit-profile.php">Editar Perfil</a></p><br>
          <p> <a class="link" href="video0.php">Video0</a></p><br>
          <p> <a class="link" href="logout.php">Logout</a></p><br>
        </article>
      </section>

    <?php else: ?>
      <div class="logo">
        <form>
          <h2>¿Who are we?</h2>
          <p class="red">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Sed expedita quis enim reprehenderit maiores sunt delectus cumque, 
            perspiciatis natus quo consectetur cupiditate! 
            Voluptates ut sunt cum sit deserunt doloremque ad.</p>
          
          <a href="signup.php">
            <button type="button" value="Registrate" class="logButton" >Registrate</button>
          </a>
          <a href="login.php">
            <button type="button" value="Iniciar Sesion" class="logButton" >Login</button>
          </a>
        </form>
    
        <h3 class="logo">StudyFans</h3>
      
      </div>
    
      <form action="">
        <div class="redes-sociales">
          <h2>Our Social Networks </h2>
          <a href="https://twitter.com/GustavoVallado4" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@GustavoVallado4</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/Aether_Fabian" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@Aether_Fabian</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/Vornic_" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@Vornic_</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/TurcoAv" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@TurvoAv</p>
        </div>
      </form>
    </form>
    <?php endif; ?>
</body>
</html>
