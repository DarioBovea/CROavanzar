<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.php');
}
$pri_nom = $_SESSION['pri_nom'];
$pri_ape = $_SESSION['pri_ape'];
$rol = 'Administrador';

?>
<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas | Dashboard</title>
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
                <?php echo $pri_nom . " " . $pri_ape ?>
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
            <table>
                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?> </p>
                <?php endif
                ?>
                <!-- <div id="barrabuscar">
                    <form action="" method="post">
                        <button class="btn_buscar" type="submit">Buscar</button>
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270; Ingresar nombre de usuario">
                    </form>
                </div> -->
                <tr>
                    <th colspan="6">Citas Agendadas</th>
                    <!-- <th colspan="2">
                        <button class="btn_agregar" onclick="abrirform()">Agregar </button>
                    </th> -->
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Especialidad</th>
                    <th>Doctor(a)</th>
                    <th>Paciente</th>
                    <th>Acciones</th>
                </tr>
                <?php
                require '../config/database.php';
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // $stmt = $conn->prepare("SELECT * FROM agenda WHERE status='0'");
                    $stmt = $conn->prepare("SELECT a.id_age, a.day, a.hour, a.esp_id, a.doc_id, a.id_pac, e.especialidad, d.pri_nom, d.pri_ape, p.pri_nom AS nom_pac, p.pri_ape AS ape_pac FROM agenda a INNER JOIN especialidades e ON a.esp_id=e.id_esp INNER JOIN especialistas d ON  a.doc_id=d.id_esp INNER JOIN pacientes p ON  a.id_pac=p.id_pac WHERE a.status='0'");
                    $stmt->execute();
                    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    // $result=$stmt->fetchAll();
                    // print_r($result);
                    foreach (($stmt->fetchAll()) as $mostrar) {
                ?>
                <tr>
                <?php
                    echo " <td>" . $mostrar['day'] . "</td>";
                    echo " <td>" . date($mostrar['hour']) . "</td>";
                    echo " <td>" . $mostrar['especialidad'] . "</td>";
                    echo " <td>" . $mostrar['pri_nom'] . " " . $mostrar['pri_ape'] . "</td>";
                    echo " <td>" . $mostrar['nom_pac'] . " " . $mostrar['ape_pac'] . "</td>";
                    echo " <td style='text-align: center' ><a href=\"deletecita.php?cod =$mostrar[id_age]\" onClick=\"return confirm('Estas seguro de eliminar la cita?')\"><i class='fa fa-trash' style='color: #098897' aria-hidden='true'></i></a></td>";
                ?>
                </tr>
                <?php
                    }
                    $conn = NULL;
                    $stmt = NULL;
                    unset($result);
                ?>
            </table>
        </articule>
    </section>

    <!--//////////////////////////////////////////////////-->

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

    function cancelarformagr() {
        document.getElementById("formregistrar").style.display = "none";
    }
</script>
</html>