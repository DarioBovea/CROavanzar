<?php
    require '../config/database.php';
    try {
        $id_esp=$_GET['cod'];
        $tip_doc=$_POST['tip_doc'];
        $num_doc=$_POST['num_doc'];
        $pri_nom=$_POST['pri_nom'];
        $seg_nom=$_POST['seg_nom'];
        $pri_ape=$_POST['pri_ape'];
        $seg_ape=$_POST['seg_ape'];
        $fec_nac=$_POST['fec_nac'];
        $esp=$_POST['esp'];
        $email=$_POST['email']; 
        $dir=$_POST['dir'];
        $tel=$_POST['tel'];

        $sql = "UPDATE especialistas SET tip_doc='$tip_doc', num_doc='$num_doc', pri_nom='$pri_nom', seg_nom='$seg_nom', pri_ape='$pri_ape', seg_ape='$seg_ape', fec_nac='$fec_nac', esp='$esp', email='$email', dir='$dir', tel='$tel' WHERE id_esp=$id_esp";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            $message = 'El usuario ha sido modificado exitosamente';
        }
    } catch (PDOException $e) {
        $message = 'Lo sentimos, el usuario no ha podido ser moficicado';
    }
    $stmt->closeCursor();
    $stmt = null;
    $pdo = null;
    // header('Location: ../view/pacientes.php');
    echo "<script>window.location= '../view/especialistas.php' </script>";
    echo $message;
?>