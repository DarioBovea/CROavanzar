<?php
    require ("../config/database.php");
    $cod = $_GET['cod'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM especialistas WHERE id_esp=$cod");
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;
    $pdo = null;
    // header("Location:../view/pacientes.php");
    echo "<script>window.location= '../view/especialistas.php' </script>";
?>