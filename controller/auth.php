<?php
    session_start();
    if (isset($_SESSION['email'])) {
        header('Location: router.php');
    }
    require '../config/database.php';
    try {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $records = $conn->prepare('SELECT id_pac, tip_doc, num_doc, pri_nom, pri_ape, email, password, rol FROM pacientes WHERE email=:email');
            $records-> bindParam(':email', $_POST['email']);
            $records-> execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $message= " ";
            //  if (count($results)>0){ echo "usuario encontrado" . "</br>";}
            //  if (password_verify($_POST['password'], $results['password'])) {echo "contraseña encontrada" . "</br>";
            //  }else{
            //     echo "contraseña no coinciden" . "</br>";
            //  }
            if ((!empty($results)) && (password_verify($_POST['password'], $results['password']))) {
                $message= " ";
                $_SESSION['id_pac'] = $results['id_pac'];
                $_SESSION['tip_doc'] = $results['tip_doc'];
                $_SESSION['num_doc'] = $results['num_doc'];
                $_SESSION['email'] = $results['email'];//username
                $_SESSION['pri_nom'] = $results['pri_nom'];
                $_SESSION['pri_ape'] = $results['pri_ape'];
                $_SESSION['rol']= $results['rol'];
                header('Location: router.php');
            } else {
                session_unset();
                session_destroy();
                $message= "Lo sentimos, estas credenciales no coinciden";
                require '../view/login.php';
            }
        }
     } catch (\Throwable $th) {
         throw $th;
     }
?>