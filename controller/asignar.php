<?php
    require '../config/database.php';
    try {
        $id_age=$_GET['cod'];
        $id_pac=$_GET['pac'];

        $sql = "UPDATE agenda SET status='0',  id_pac=$id_pac WHERE id_age=$id_age";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            $message = 'La agenda ha sido modificada exitosamente';
        }
    } catch (PDOException $e) {
        $message = 'Lo sentimos, la agenda no ha podido ser moficicada';
    }
    $stmt->closeCursor();
    $stmt = null;
    $pdo = null;
    echo "<script>window.location= '../view/agendarCita.php' </script>";
?>