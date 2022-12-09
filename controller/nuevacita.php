<?php
    session_start();
    require '../config/database.php';
    date_default_timezone_set('America/Bogota');
    $hoy = getdate();
    $id_pac= $_SESSION['id_pac'];
    $pri_nom= $_SESSION['pri_nom'];
    $pri_ape= $_SESSION['pri_ape'];
    $tip_doc= $_SESSION['tip_doc'];
    $num_doc= $_SESSION['num_doc'];
    $day=$_POST['fec_date'];
    $esp_id=$_POST['esp_id'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM agenda WHERE day='$day' AND esp_id='$esp_id' AND status=1");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $message=" ";
    $retVal = (count($result)<1) ? $message="No se econtro nada" : $message="Encontre: " . count($result);
?>

<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agenda tu cita | CRO Avanzar</title>
        <link rel="icon" href="../public/img/icocro.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <h3><?php echo $tip_doc ." ". $num_doc ?></h3>

                <div style='position:absolute; bottom:0; text-align:center ' class="f_presentacion">
                    <p><a id="cerrar" href="..\controller\logout.php" class="form_button">Cerrar Cesion</a></p>
                </div>
            </aside>
            <articule class="tablas">
                <ul class="main-menu">
                    <li class="menu-iten">
                        <a href="../view/agendarCita.php">Citas agendadas</a>
                    </li>
                </ul>
                <div class="message">
                    <?php
                        if (!empty($message)): ?>
                        <p><?=$message?></p>
                        <?php endif;
                    ?>
                </div>
                <table>
                    <tr><th colspan="5">Horarios disponibles</th></tr>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Especialidad</th>
                        <th>Doctor(a)</th>
                        <th>Asignar</th>
                    </tr>

                    <?php               
                        foreach ($result as $mostrar) {
                    ?>
                        <tr>
                    <?php
                        echo " <td>" . $mostrar['day'] . "</td>";
                        echo " <td>" . $mostrar['hour'] . "</td>";
                        echo " <td>" . $mostrar['esp_id'] . "</td>";
                        echo " <td>" . $mostrar['doc_id'] . "</td>";
                        echo " <td style='text-align: center'><a href=\"asignar.php?cod=$mostrar[id_age]&pac=$_POST[id_pac]\">Asignar</a>";
                    ?>
                        </tr>
                    <?php
                        }
                        unset($result);
                        unset($stmt);
                    ?>
                </table>
            </articule>
        </section>
    </body>
</html>