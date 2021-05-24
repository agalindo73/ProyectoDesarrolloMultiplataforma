<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
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
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido al Centro de Monitoreo de Laboratorio Nutricion y Fisiologia</title>
     <link rel="stylesheet" href="assets/css/style.css">
     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   
  </head>
  <body>
   <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Ha iniciado sesion correctamente
      <a href="logout.php">
        Cerrar sesion
      </a>
    <?php else: ?>
      <h1 style="text-align:center">Bienvenido al Centro de Monitoreo de los Sistemas de Recirculacion Acuicola del Laboratorio Nutricion y Fisiologia IIO-UABC</h1>

      <a href="login.php" style="text-align: center; display: inline-block; width: 100%;" >Acceso</a> 
      <a href="signup.php" style="text-align: center; display: inline-block; width: 100%;">Registrar</a>
    <?php endif; ?>
  </body>
</html>
