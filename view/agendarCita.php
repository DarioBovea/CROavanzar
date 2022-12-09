<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.php');
    }
    include_once '../config/database.php';
    $id_pac= $_SESSION['id_pac'];
    $pri_nom= $_SESSION['pri_nom'];
    $pri_ape= $_SESSION['pri_ape'];
    $tip_doc= $_SESSION['tip_doc'];
    $num_doc= $_SESSION['num_doc'];
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
     <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> -->
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
            <!-- <p><?php
                // $d = strtotime("-5 Hours");
                // echo date("d/m/Y", $d) . "<br>";
                // ?>
                <?php  //echo date("h:i a", $d) . "<br>"; ?>
            </p> -->
            <div style='position:absolute; bottom:0; text-align:center ' class="f_presentacion">
                <p><a id="cerrar" href="..\controller\logout.php" class="form_button">Cerrar Cesion</a></p>
            </div>
        </aside>
        <articule class="tablas">
        <ul class="main-menu">
                <!-- <li class="menu-iten">
                    <a href="agendar.php">Agendar cita</a>
                </li> -->
                <li class="menu-iten">
                    <a href="#">Citas agendadas</a>
                </li>
            </ul>

            <table>
                <div class="message">
                    <?php if (!empty($message)) : ?>
                        <p> <?= $message ?> </p>
                    <?php endif
                    ?>
                </div>
                <tr>
                    <th colspan="3">
                        Citas
                    </th>
                    <th colspan="2">
                        <button class="btn_agregar" onclick="abrirform()">Nueva Cita </button>
                    </th>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Especialidad</th>
                    <th>Doctor(a)</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM agenda WHERE id_pac=$id_pac");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach (($stmt->fetchAll()) as $mostrar) {
                ?>
                <tr>
                <?php
                    echo " <td>" . $mostrar['day'] . "</td>";
                    echo " <td>" . $mostrar['hour'] . "</td>";
                    echo " <td>" . $mostrar['esp_id'] . "</td>";
                    echo " <td>" . $mostrar['doc_id'] . "</td>";
                    echo " <td style='text-align: center'><a href=\"../controller/deletecita.php?cod=$mostrar[id_age] \" onClick=\"return confirm('Estas seguro de eliminar su cita\"><i class='fa fa-trash' style='color: #098897' aria-hidden='true'></i></a></td>";
                ?>
                </tr>
                <?php
                    }
                ?>
            </table>
            
        </articule>
    </section>
    <div class="caja_popup" id="formregistrar">
        <div class="contenedor_popup">
            <form class="form_registrar" id="form_registrar" action="../controller/nuevacita.php" method="post">
                <label class="lbl_registrar">Seleccione un Especialidad: </label>
                    <select class="input_registrar" name="esp_id" require>
                        <option value="1">Auditoria</option>
                        <option value="2">Fisioterapia Deportiva</option>
                        <option value="3">Kinesiotaping</option>
                        <option value="4">Medicina</option>
                        <option value="5">Neurologia</option>
                        <option value="6">Reumatologia</option>
                        <option value="7" selected>Terapia Respiratoria</option>
                    </select>
                <label class="lbl_registrar">Seleccione fecha deseada</label>
                <input class="input_registrar" type="date" name="fec_date" required />
                <input type="hidden" name="id_pac" value="<?php echo $id_pac; ?>">
            </form>
            <button class="form_btn" id="btn_reg" type="submit" form="form_registrar">Consultar Agenda</button>
            <button class="form_btn" id="btn_reg" type="button" onclick="cancelarform()">Cancelar</button>
        </div>
    </div>
</body>
<!--//////////////////////////////////////////////////-->
<script>
    function abrirform() {
        document.getElementById("formregistrar").style.display = "block";
    }

    function cancelarform() {
        document.getElementById("formregistrar").style.display = "none";
    }
</script>
</html>


