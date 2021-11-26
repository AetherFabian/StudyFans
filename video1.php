<?php
    include_once('SQL/database.php');
    $query = "SELECT id_comment, (SELECT name_channel FROM tb_channels 
                                    WHERE tb_channels.id_channel = tb_comments.id_channel),
                     commented_at, content FROM tb_comments WHERE id_video = 2;" ;
    $statement = $conn->prepare($query);
    $statement->execute();
    $comment = $statement->fetchAll();
    $statement->closeCursor();

    include_once('SQL/database.php');
    $sql = "SELECT description_video FROM tb_videos WHERE id_video = 2;" ;
    $statement = $conn->prepare($sql);
    $statement->execute();
    $video = $statement->fetchAll();
    $statement->closeCursor();

    $cont=1;

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

    <video width="620px" height="540px" controls>
        <source src="files/videos/Process and Package Management on UNIX.Linux.mp4" type="video/mp4">
    </video><br>
    <?php foreach($video as $video): ?>
        <p>Description:  <?php echo $video['description_video']; ?></p>
    <?php endforeach; ?>
    <table class="table table-striped">
            <tr>
                <td>Comentario</td>
                <td>Por:</td>
                <td>Fecha:</td><br>
            </tr>
            <?php foreach($comment as $comment): ?>
            <tr>
                <td>
                    <?php echo $comment['content']; ?>
                </td>
                <td>
                    <?php echo $comment['(SELECT name_channel FROM tb_channels 
                                    WHERE tb_channels.id_channel = tb_comments.id_channel)']; ?>
                </td>
                <td>
                    <?php echo $comment['commented_at']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
      <div class="logo">
        <form>
          <h2>¿Who are we?</h2>
          <?php  include('partials/whoarewe.php') ?>
          
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