<?php
    require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>
<?php if(!empty($id)): ?>
    <?php  include('partials/header.php') ?>
    <style>
        .logButton{
    align-items: center;
    background-color: rgb(255, 66, 77);
    border-radius: 9999px;
    border: 1px solid rgb(255, 66, 77);
    align-items: center;
    background-color: rgb(255, 66, 77);
    border-radius: 99px;
    border: 1px solid rgb(255, 66, 77);
    box-sizing: border-box;
    cursor: pointer;
    display: inline-flex;
    font-weight: 500;
    height: unset;
    justify-content: center;
    padding: 0.78125rem 5.3rem;
    position: relative;
    pointer-events: unset;
    text-align: center;
    color: rgb(255, 255, 255) !important;
    font-size: 1rem !important;
}
.logOutButton{
    align-items: center;
    background-color: rgb(255, 66, 77);
    border: 1px solid rgb(255, 66, 77);
    align-items: center;
    background-color: rgb(255, 66, 77);
    border-radius: 15px;
    border: 1px solid rgb(255, 66, 77);
    box-sizing: border-box;
    cursor: pointer;
    display: inline-flex;
    font-weight: 500;
    height: unset;
    justify-content: center;
    padding: 0.78125rem 5.3rem;
    position: relative;
    pointer-events: unset;
    text-align: center;
    color: rgb(255, 255, 255) !important;
    font-size: 1rem !important;
    position: absolute;
    display: inline;
    right: 0;
}
    </style>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
            <a href="logout.php">
            <button type="button" value="logout" class="logOutButton">Log Out</button>
            </a>
                <div class="perfil-usuario-avatar">
                    <img src="https://logos-marcas.com/wp-content/uploads/2020/11/GitHub-Logo.png" alt="img-avatar">
                </div>
               
            </div>
        </div>
        
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h1 class="titulo"><?= $id['name_user']; ?></h1>
                
            </div>
            <div class="perfil-usuario-footer">
            <h2 class="texto"><?= $id['profileDesc']; ?></h2>
            </div>
            <a href="edit-profile.php">
            <button type="button" value="Edit-Profile" class="logButton">Edit Profile</button>
          </a>
        </div>

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