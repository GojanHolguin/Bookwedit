<?php
    require 'database.php';

    $message = '';

    if (!empty($_POST['names']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO usuarios (names, email, password) VALUES (:names, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':names',$_POST['names']);
        $stmt->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Nuevo usuario creado con exito';
        } else {
            $message = 'Lo siento, debe haber un problema al crear su cuenta';
        }
    }
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="description" content="PROYECTO FINAL"/>
<meta name="keywords" content="HTML5, css3, Javascript, Diseño Web"/>
<title>Bookwedit-Registro</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="css/login-register.css">
<link rel="icon" type="image/jpg" href="img/buho.png">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/register.js"></script>

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

    <form action="register.php" method="post" class="formulario">

    		<?php if(!empty($message)): ?>
        		<p><?= $message ?></p>
    		<?php endif; ?>

            <h2>Registrate</h2>

            <div class="user_info">

                <label for="names"><span class="fas fa-user-alt"></span>Nombres*</label>
                <input type="text" id="names" name="names" required>

                <label for="email"><span class="fas fa-envelope"></span>Correo Electronico*</label>
                <input type="text" id="email" name="email" required>

                <label for="password"><span class="fas fa-unlock-alt"></span>Contraseña*</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Registrarse" id="btnSend">

            </div>

            <div class="parrafos">
                <p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
                <p>¿Ya tienes una Cuenta? <a href="login.php"><span class="fas fa-hand-point-right"></span> Inicia Sesión </a></p>
            </div>
            
        </form>

</section>

</body>
</html>