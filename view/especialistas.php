<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.php');
    }
    include_once '../config/database.php';
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
    <title>Dashboard | Especialistas</title>
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
                <div class="message">
                    <?php if (!empty($message)) : ?>
                        <p> <?= $message ?> </p>
                    <?php endif
                    ?>
                </div>
                <!-- <div id="barrabuscar">
                    <form action="" method="post">
                        <button class="btn_buscar" type="submit">Buscar</button>
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270; Ingresar nombre de usuario">
                    </form>
                </div> -->
                <tr>
                    <th colspan="7">
                        Especialistas
                    <th colspan="2">
                        <button class="btn_agregar" onclick="abrirform()">Agregar </button>
                    </th>
                </tr>
                <tr>
                    <th>Tipo Doc</th>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>

                <?php
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT d.id_esp, d.tip_doc, d.num_doc, d.pri_nom, d.pri_ape, d.esp_id, d.email, d.dir, d.tel, e.especialidad FROM especialistas d  INNER JOIN especialidades e ON d.esp_id=e.id_esp");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach (($stmt->fetchAll()) as $mostrar) {
                ?>
                <tr>
                <?php
                    echo " <td style='text-align: center'>" . $mostrar['tip_doc'] . "</td>";
                    echo " <td>" . $mostrar['num_doc'] . "</td>";
                    echo " <td>" . $mostrar['pri_nom'] . "</td>";
                    echo " <td>" . $mostrar['pri_ape'] . "</td>";
                    echo " <td>" . $mostrar['especialidad'] . "</td>";
                    echo " <td>" . $mostrar['email'] . "</td>";
                    echo " <td>" . $mostrar['dir'] . "</td>";
                    echo " <td>" . $mostrar['tel'] . "</td>";
                    echo " <td style='text-align: center'><a href=\"frmupdateesp.php?cod=$mostrar[id_esp]\"><i class='fa-solid fa-pen-to-square' style='color: #098897' aria-hidden='true'></i></a> | <a href=\"../controller/deleteesp.php?cod=$mostrar[id_esp] \" onClick=\"return confirm('Estas seguro de eliminar a $mostrar[pri_nom] $mostrar[pri_ape]')\"><i class='fa fa-trash' style='color: #098897' aria-hidden='true'></i></a></td>";
                ?>
                </tr>
                <?php
                    }
                    $stmt=NULL;
                    unset($result);
                ?>
            </table>
        </articule>
    </section>

    <!--//////////////////////////////////////////////////-->

    <div class="caja_popup" id="formregistrar">
        <?php
            include 'partial/frmespecialistas.php';
        ?>
    </div>

</body>

</html>