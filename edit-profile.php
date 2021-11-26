<?php
    require 'session.php';
?>
<!DOCTYPE html>
<html class="text-center" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php if(!empty($id)): ?>
        <?php  include('partials/header.php') ?>
        <style>
        .updateButton{
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
      </style>
    <div class="container profile profile-view" id="profile">
        
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><span>El perfil fue guardado exitosamente.</span></div>
            </div>
        </div>

     <form action="edit-profile-next.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value = "<?php echo $id['id_user']; ?>">
        <div class="row profile-row">
            
             <div class="col-md-4 relative">
                
                <div class="avatar">
                     <div class="avatar-bg center"></div>
                 </div><label class="form-label"><h2><?= $id['name_user']; ?></h2></label>
                 
                <div class="form-group mb-3"><label class="form-label">Descripción de perfil</label><input class="form-control" type="text" autocomplete="off" required="" name="desc" value="<?php echo $id['profileDesc']; ?>">
                    <a href="profile.php">Volver al perfil</a>
                </div>
        </div>
        
            <div class="col-md-8">
                <h1>Editar perfil</h1>
                <hr>
                
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-3"><label class="form-label">Nombre(s)</label><input id="firstname" class="form-control" type="text" name="fName" value="<?php echo $id['firstname_user'];?>"></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-3"><label class="form-label">Apellidos</label><input id="lastname" class="form-control" type="text" name="lName" value="<?php echo $id['lastname_user']; ?>"></div>
                    </div>
                </div>
                
                <div class="form-group mb-3"><label class="form-label">Email </label><input class="form-control" type="email" autocomplete="off" required="" name="mail" placeholder="" readonly value="<?php echo $id['mail_user']; ?>"> 
                    <div class="form-group mb-3"><label class="form-label">Paypal Email</label><input class="form-control" type="email" autocomplete="off" name="paypal" value="<?php echo $id['paypal_info']; ?>">
                    <div class="form-group mb-3"><label class="form-label">Fecha de nacimiento</label><input class="form-control" id="date" type="date" name="birthDt" value="<?php echo $id['dateBirth_user']; ?>"></div></div>
                </div>
                
                </div>
                    
                <div class="row">
                    <div class="col-md-12 content-right">
                        <input class="updateButton" value="Guardar Cambios" type="submit">
                    </div>
                </div>
            </div>
        </div>
        </form>
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