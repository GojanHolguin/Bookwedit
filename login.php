<?php
    
    session_start();

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, names, email, password FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: /Bookwedit/iniciocuenta.php');
        } else {
            $message = 'Lo siento, pero estas credenciales no coinciden';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="description" content="PROYECTO FINAL"/>
<meta name="keywords" content="HTML5, css3, Javascript, Diseño Web"/>
<title>Bookwedit-Login</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="css/login-register.css">
<link rel="icon" type="image/jpg" href="img/buho.png">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/login.js"></script>

</head>
<body>
    <section class="form_wrap">
        <section class="contacto_info">
            <section class="info_titulo">
                <span class="fas fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fas fa-envelope"></span> info-contactbook@gmail.com </p>
                <p><span class="fas fa-mobile"></span> +57 3107345111 </p>
                <a href="iniciobook.html"><span class="fas fa-house-user"></span> Inicio</a>
            </section>
        </section>

        <form action="login.php" method="post" class="formulario">

            <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
            <?php endif; ?>

            <h2>Iniciar Sesión</h2>

            <div class="user_info">

                <label for="email"><span class="fas fa-envelope"></span>Correo Electronico*</label>
                <input type="text" id="email" name="email" required>

                <label for="password"><span class="fas fa-unlock-alt"></span>Contraseña*</label>
                <input type="password" id="password" name="password" required >

                <input type="submit" value="Iniciar Sesión" id="btnSend">

            </div>

            <div class="parrafos">
                <p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
                <p>¿No tienes una Cuenta? <a href="register.php"><span class="fas fa-hand-point-right"></span> Registrate </a></p>
                <p>¿Olvidaste tu contraseña? <a href="Recover.html"><span class="fas fa-hand-point-right"></span> Recuperala Aqui </a></p>
            </div>
            
        </form>

    </section>

</body>
</html>