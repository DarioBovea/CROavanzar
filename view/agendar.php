<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.php');
    }
    include_once '../config/database.php';
    date_default_timezone_set('America/Bogota');
    $day = date('Y-m-d');
    $hour = date('H:i');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM agenda WHERE day<$day AND hour<$hour");
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
    <title>Crear Agenda | Dashboard</title>
    <link rel="icon" href="../public/img/icocro.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
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
            <table id="table">
                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?> </p>
                <?php endif
                ?>
                <button class="btn_agregar" onclick="abrirform()">Agregar </button>

                <!-- <thead>
                    <th style='text-align: center' colspan="4">
                        Crear Agenda
                    </th>
                    <th style='text-align: center' colspan="2">
                        <button class="btn_agregar" onclick="abrirform()">Agregar </button>
                    </th>
                </thead> -->
                <thead>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Especialidad</th>
                    <th>Doctor(a)</th>
                    <th>Acciones</th>
                </thead>
                <?php
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT a.id_age, a.day, a.hour, a.esp_id, a.doc_id , e.especialidad, d.pri_nom, d.pri_ape FROM agenda a INNER JOIN especialidades e ON a.esp_id=e.id_esp INNER JOIN especialistas d ON  a.doc_id=d.id_esp");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach (($stmt->fetchAll()) as $mostrar) {
                ?>
                <tr>
                <?php
                    echo " <td>" . $mostrar['day'] . "</td>";
                    echo " <td>" . $mostrar['hour'] . "</td>";
                    echo " <td>" . $mostrar['especialidad'] . "</td>";
                    echo " <td>" . $mostrar['pri_nom'] . " ". $mostrar['pri_ape'] . "</td>";
                    // echo " <td style='text-align: center' ><a href=\"updateage.php?cod =$mostrar[id_age]\">Modificar</a> | <a href=\"deleteage.php?cod =$mostrar[id_age]\" onClick=\"return confirm('Estas seguro de eliminar a $mostrar[day] $mostrar[hour] $mostrar[esp_id] $mostrar[doc_id]?')\">Eliminar</a></td>";
                    echo " <td style='text-align: center'><a href=\"frmupdateage.php?cod=$mostrar[id_age]\"><i class='fa-solid fa-pen-to-square' style='color: #098897' aria-hidden='true'></i></a> | <a href=\"../controller/deleteage.php?cod=$mostrar[id_age] \" onClick=\"return confirm('Estas seguro de eliminar')\"><i class='fa fa-trash' style='color: #098897' aria-hidden='true'></i></a></td>";
                ?>
                </tr>
                <?php
                }
                ?>
            </table>
        </articule>
    </section>

    <!--//////////////////////////////////////////////////-->

    <div class="caja_popup" id="formage">
        <?php
            include 'partial/frmagendar.php';
        ?>
    </div>

</body>

<script>
    var myTable = document.querySelector("#table");
    var dataTable = new DataTable(myTable);
</script>

</html>
