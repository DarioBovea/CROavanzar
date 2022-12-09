<?php
    require ("../config/database.php");
    $cod = $_GET['cod'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM agenda WHERE id_age=$cod");
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;
    $pdo = null;
    // header("Location:../view/pacientes.php");
    echo "<script>window.location= '../view/agendar.php' </script>";
?>