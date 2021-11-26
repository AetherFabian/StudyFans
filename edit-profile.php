<?php
    require 'session.php';
?>
<!DOCTYPE html>
<html class="text-center" lang="es">

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
                 
                <div class="form-group mb-3"><label class="form-label">Descripción de perfil</label><input class="form-control" type="text" autocomplete="off" required="" name="desc" value="<?php echo $id['profileDesc']; ?>"></div>
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
                    <div class="col-md-12 content-right"><a href="profile.php">Volver al perfil</a>
                        <input class="btn btn-primary text-end" value="Guardar Cambios" type="submit">
                    </div>
                </div>
            </div>
        </div>
        </form>
        
    <p>Aquí puedes decidir si quieres eliminar tu cuenta.&nbsp;<a href="delete-account.php">Eliminar cuenta</a></p>
    <?php else: ?>
      <h1>Por favor ingrese su cuenta o registrese </h1>

      <a href="login.php">Iniciar sesion</a> o
      <a href="signup.php">Registro</a>
    <?php endif; ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>