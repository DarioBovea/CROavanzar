<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.php');
    }
    $pri_nom= $_SESSION['pri_nom'];
    $pri_ape= $_SESSION['pri_ape'];
    $rol='Administrador';
?>
<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CRO Avanzar</title>
    <link rel="icon" href="../public/img/icocro.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <header class="fila_dashboard">
        <div id="logo_dashboard">
            <a href="dashboard.php"><img src="../public/img/icocro.png" alt="CRO Avanzar" /></a>            
        </div>
            <h4>CRO Avanzar Programa De Atencion Integral</h4>
            <i id="usuario_dash" class="fas fa-user"></i>
            <div id="nombre">
                <p><?php echo "Hola, " . $pri_nom ?></p>
            </div>
            <div id="ico-menu-dash">
                <a href="#"><i style="color: #022737" class="fas fa-caret-down"></i></a>
            </div>
    </header>
    <section class="section_dash">
        <aside class="presentacion">
            <div id="usuario_presentacion">
                <i class="fas fa-user"></i>
            </div>
            <h2>
                <?php echo $pri_nom ." " . $pri_ape ?>
            </h2>
            <h3><?php echo $rol ?></h3>
            <p><?php
                $d = strtotime("-5 Hours");
                echo date("d/m/Y", $d) . "<br>";
                ?>
                <?php echo date("h:i a", $d) . "<br>"; ?>
            </p>
            <div class="f_presentacion">
                <p><a id="cerrar" href="..\controller\logout.php" class="form_button">Cerrar Cesion</a></p>
            </div>
        </aside>
        <articule class="tablas">
        <ul class="main-menu">
                <li class="menu-iten">
                    <a href="agendar.php">Crear Agenda</a>
                </li>
                <li class="menu-iten">
                    <a href="citas.php">Citas</a>
                </li>                
                <li class="menu-iten">
                    <a href="especialistas.php">Especialistas</a>
                </li>
                <li class="menu-iten">
                    <a href="pacientes.php">Pacientes</a>
                </li>
            </ul>
            
        </articule>
    </section>
</body>
</html>