<?php
    session_start();
    if (isset($_SESSION['email'])) { //si esta definida, ha iniciado sesion, puede continuar
        header('Location: ../controller/router.php'); //redireccionar a la pagina principal, sino se tiene q loguear
    }
?>

<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="../public/img/icocro.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="img-login">

   <section class="container-login">
        <div class="container_signin">
            <form class="form" action="../controller/auth.php" method="post">
                <h2 id="form_tittle">Bienvenidos</h2>
                <div class="message">
                    <?php
                        if (!empty($message)): ?>
                        <p><?=$message?></p>
                        <?php endif;
                    ?>
                </div>
                <div class="form_group">
                    <i class="fas fa-envelope form_icon"></i>
                    <input type="mail" class="form_input" name="email" placeholder="Usuario" required>
                </div>
                <div class="form_group">
                    <i class="fas fa-unlock-alt form_icon"></i>
                    <input type="password" class="form_input"  name="password" placeholder="Contraseña" required>
                </div>
                <button class="form_btn" type="submit">Iniciar Sesion</button>
                <!-- <a target="_blank" href="registration.php" class="form_btn">¡Registrate!</a> -->
                <a href="forgetpassword.php" class="forget">¿ Olvidaste tu contraseña ?</a>
            </form>
        </div>
        <div class="container_logo">
            <a href="../index.php"><img id="img-login" src="../public/img/logoCRO.png" alt="CRO Avanzar" /></a>
        </div>
    </section>
</div>
</body>
</html>