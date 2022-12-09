<?php
    require '../config/database.php';
    try {
        $id_age=$_GET['cod'];
        $day=$_POST['day'];
        $hour=$_POST['hour'];
        $esp_id=$_POST['esp_id'];
        $doc_id=$_POST['doc_id'];

        $sql = "UPDATE agenda SET day='$day', hour='$hour', esp_id='$esp_id', doc_id='$doc_id' WHERE id_age=$id_age";
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
    echo "<script>window.location= '../view/agendar.php' </script>";
?>