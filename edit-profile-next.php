<?php
    include_once('SQL/database.php');
    
    $query = 'CALL SP_update_user(:id, :fName, :lName, :mail, :paypal, :birthDt, :profileD)';
    $statement = $conn->prepare($query);
 
    $id = $_POST['id'];
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $mail=$_POST['mail'];
    $paypal=$_POST['paypal'];
    $birthDt=$_POST['birthDt'];
    $desc=$_POST['desc'];
 
    $statement->bindValue(':id' , $id);
    $statement->bindValue(':fName' , $fName);
    $statement->bindValue(':lName' , $lName);
    $statement->bindValue(':mail' , $mail);
    $statement->bindValue(':paypal' , $paypal);
    $statement->bindValue(':birthDt' , $birthDt);
    $statement->bindValue(':profileD' , $desc);
 
    $statement->execute();
    $statement->closeCursor();

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
      <?php  include('partials/header.php') ?>
      <section>
        <article>
            <form>
              <?php header('Location: profile.php'); ?>
            </form>
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