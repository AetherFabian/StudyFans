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

      <section>
        <article>
            <p>Usuario actualizado </p>
            <form action="index.php" method="POST">
                <input type="submit" value="Volver">
            </form>
        </article>
      </section>

    <?php else: ?>
      <h1>Por favor ingrese su cuenta o registrese </h1>

      <a href="login.php">Iniciar sesion</a> o
      <a href="signup.php">Registro</a>
    <?php endif; ?>
</body>
</html>