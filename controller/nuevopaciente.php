<?php
    include_once '../config/database.php';
    $message = ' ';
    try {
        $records=$conn->prepare('SELECT num_doc, email FROM pacientes WHERE num_doc=:num_doc OR email=:email');
        $records->bindParam(':num_doc', $_POST['num_doc']);
        $records->bindParam(':email', $_POST['email']);
        $records-> execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);
        if ($results>0) {
            $message="El ususario ya se encuentra registrado";
        } else {
            $sql = "INSERT INTO pacientes (num_doc, tip_doc, pri_nom, seg_nom, pri_ape, seg_ape, fec_nac, email, dir, tel, password, rol) VALUES (:num_doc,:tip_doc, :pri_nom, :seg_nom, :pri_ape, :seg_ape, :fec_nac, :email, :dir, :tel, :password, :rol)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':num_doc', $_POST['num_doc']);
            $stmt->bindParam(':tip_doc', $_POST['tip_doc']);
            $stmt->bindParam(':pri_nom', $_POST['pri_nom']);
            $stmt->bindParam(':seg_nom', $_POST['seg_nom']);
            $stmt->bindParam(':pri_ape', $_POST['pri_ape']);
            $stmt->bindParam(':seg_ape', $_POST['seg_ape']);
            $stmt->bindParam(':fec_nac', $_POST['fec_nac']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':dir', $_POST['dir']);
            $stmt->bindParam(':tel', $_POST['tel']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password);
            $rol = '3';
            $stmt->bindParam(':rol', $rol);
            if ($stmt->execute()) {
                $message = 'El usuario ha sido creado exitosamente';
            }
        }
    } catch (PDOException $e) {
        $message = 'Lo sentimos, ha ocurrido un error creando al nuevo usuario';
        require '../view/registro.php';
    }
    $stmt->closeCursor();
    $stmt = null;
    $pdo = null;
    echo "<script>window.location= '../view/pacientes.php' </script>";
?>