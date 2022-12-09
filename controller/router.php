<?php
    session_start();
    if($_SESSION['rol']=='1'){
        header('Location:../view/dashboard.php');
    }
    if($_SESSION['rol']=='2'){
        echo "Hasta ahora todo bien, vamos a otra";
        //header('Location: home.php');
    }
    if ($_SESSION['rol']== '3'){
        header('Location: ../view/agendarCita.php');
    }
?>