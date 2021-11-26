<?php
    include_once('SQL/database.php');
    $query = "SELECT id_comment, id_channel, (SELECT name_channel FROM tb_channels 
                                    WHERE tb_channels.id_channel = tb_comments.id_channel),
                    commented_at, content FROM tb_comments WHERE id_video = 2;";
    $statement = $conn->prepare($query);
    $statement->execute();
    $comment = $statement->fetchAll();
    $statement->closeCursor();

    include_once('SQL/database.php');
    $sql = "SELECT title_video, description_video FROM tb_videos WHERE id_video = 2;";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $video = $statement->fetchAll();
    $statement->closeCursor();

    $cont = 1;

    require 'session.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Study Fans</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/html5-video.css">
    <link rel="stylesheet" href="assets/css/Like-Button-for-PanelBear-Analytics.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php if (!empty($id)) : ?>

        <?php include('partials/header.php') ?>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php foreach ($video as $video) : ?>
                        <h1><?php echo $video['title_video']; ?></h1>
                    <?php endforeach; ?>

                    <video controls>
                        <source src="files/videos/User Managing (Ubuntu).mp4" type="video/mp4">
                    </video>

                    <dl class="row">
                        <dt class="col-sm-3">Description:</dt>
                        <dd class="col-sm-9">
                            <p><?php echo $video['description_video']; ?></p>
                        </dd>
                    </dl>
                </div>
                <div id="comments" class="comments-area">
                    <h2 class="comments-title">Comments</h2>

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
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="logo">
            <form>
                <h2>¿Who are we?</h2>
                <?php  include('partials/whoarewe.php') ?>

                <a href="signup.php">
                    <button type="button" value="Registrate" class="logButton">Registrate</button>
                </a>
                <a href="login.php">
                    <button type="button" value="Iniciar Sesion" class="logButton">Login</button>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>