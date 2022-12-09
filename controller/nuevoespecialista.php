<?php
    include_once '../config/database.php';
    $message = ' ';
    try {
        $records=$conn->prepare('SELECT num_doc, email FROM especialistas WHERE num_doc=:num_doc OR email=:email');
        $records->bindParam(':num_doc', $_POST['num_doc']);
        $records->bindParam(':email', $_POST['email']);
        $records-> execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);
        if ($results>0) {
            $message="El ususario que intenta agregar ya se encuentra registrado";
        } else {
            $sql = "INSERT INTO especialistas (tip_doc, num_doc, pri_nom, seg_nom, pri_ape, seg_ape, fec_nac, esp, email, dir, tel) VALUES (:tip_doc, :num_doc, :pri_nom, :seg_nom, :pri_ape, :seg_ape, :fec_nac, :esp, :email, :dir, :tel)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tip_doc', $_POST['tip_doc']);
            $stmt->bindParam(':num_doc', $_POST['num_doc']);
            $stmt->bindParam(':pri_nom', $_POST['pri_nom']);
            $stmt->bindParam(':seg_nom', $_POST['seg_nom']);
            $stmt->bindParam(':pri_ape', $_POST['pri_ape']);
            $stmt->bindParam(':seg_ape', $_POST['seg_ape']);
            $stmt->bindParam(':fec_nac', $_POST['fec_nac']);
            $stmt->bindParam(':esp', $_POST['esp']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':dir', $_POST['dir']);
            $stmt->bindParam(':tel', $_POST['tel']);
            // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            // $stmt->bindParam(':password', $password);
            // $rol = '3';
            // $stmt->bindParam(':rol', $rol);
            if ($stmt->execute()) {
                $stmt->closeCursor();
                $message = 'El especialista ha sido creado exitosamente';
            }
        }
    } catch (PDOException $e) {
        $message = 'Lo sentimos, ha ocurrido un error creando al nuevo especialista';
    }
    $stmt = null;
    $pdo = null;
    echo "<script>window.location= '../view/especialistas.php' </script>";
?>