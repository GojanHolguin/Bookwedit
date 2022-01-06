<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, names, email, password FROM usuarios WHERE id =:id');
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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="PROYECTO FINAL"/>
	<meta name="keywords" content="HTML5, css3, Javascript, Diseño Web"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Navegacion/Logut</title>
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/logut.css">
	<link rel="icon" type="image/jpg" href="img/buho.png">
</head>
<body>
<section class="cont_principal" id="contenidoprincipal">
	<?php if(!empty($user)): ?>
		<br>Bienvenido. <?= $user['names']; ?>
		<br>Correo. <?= $user['email']; ?>
		<br>Acabas de iniciar sesion satisfactoriamente.
		<br>Puedes cerrar sesion
		<a href="logut.php"><span class="fas fa-hand-point-right"></span>
  			Aqui.</a>
		<!---</a><br>O puedes ir a la
		<a href="iniciobook.html"><span class="fas fa-hand-point-right"></span>
			Pagina de inicio.
		</a>--->
	<?php else: ?>
<footer class="content_footer">
	<?php endif; ?>
</body>
</html>

