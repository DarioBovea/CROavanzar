<?php
    include_once '../config/database.php';
    include_once 'especialistas.php';
    $message = ' ';
    $id_esp = $_GET['cod'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT d.id_esp, d.tip_doc, d.num_doc, d.pri_nom, d.seg_nom, d.pri_ape, d.seg_ape, d.esp_id, d.fec_nac, d.email, d.dir, d.tel, e.especialidad FROM especialistas d  INNER JOIN especialidades e ON d.esp_id=e.id_esp");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="caja_popup2">
        <div  class="contenedor_popup2" id="formupdatepac">
            <form method="POST" class="form_modificar" id="formModificar"  action="../controller/updateesp.php?cod=<?php echo $id_esp ?>">
                <table>
                    <tr> 
                        <th colspan="2">Modificar Especialista</th>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar">Tip. Doc</label></td>
                        <td><input class="input_modificar" type="text" name="tip_doc" value="<?php echo $result['tip_doc']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Numero</label></td>
                        <td><input class="input_modificar" type="number" name="num_doc" value="<?php echo $result['num_doc']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Primer Nombre</label></td>
                        <td><input class="input_modificar" type="text" name="pri_nom" value="<?php echo $result['pri_nom']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Segundo Nombre</label></td>
                        <td><input class="input_modificar" type="text" name="seg_nom" value="<?php echo $result['seg_nom']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Primer Apellido</label></td>
                        <td><input class="input_modificar" type="text" name="pri_ape" value="<?php echo $result['pri_ape']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Segundo Apellido</label></td>
                        <td><input class="input_modificar" type="text" name="seg_ape" value="<?php echo $result['seg_ape']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Especialidad</label></td>
                        <td>
                            <select class="input_registrar" name="esp_id">
                                <option value="<?php echo $result['esp_id']; ?>"><?php echo $result['especialidad']; ?></option>
                                <option value="1">Auditoria</option>
                                <option value="2">Fisioterapia Deportiva</option>
                                <option value="3">Kinesiotaping</option>
                                <option value="4">Medicina</option>
                                <option value="5">Neurologia</option>
                                <option value="6">Reumatologia</option>
                                <option value="7">Terapia Respiratoria</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >F. Nacimiento</label></td>
                        <td><input class="input_modificar" type="date" name="fec_nac" value="<?php echo $result['fec_nac']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Email</label></td>
                        <td><input class="input_modificar" type="email" name="email" value="<?php echo $result['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Direccion</label></td>
                        <td><input class="input_modificar" type="text" name="dir" value="<?php echo $result['dir']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Tel</label></td>
                        <td><input class="input_modificar" type="number" name="tel" value="<?php echo $result['tel']; ?>" required></td>
                    </tr>
                    <!-- <tr> 
                                <td>Contraseña</td>
                                <td><input type="text" name="txtcorreo" value="<?php ?>" required></td>
                            </tr>
                            <tr> 
                                <td>Rol</td>
                                <td><input type="text" name="txttelefono" value="<?php ?>"required></td>
                            </tr> -->
                    <tr style="text-align: center">
                        <td colspan="2">
                            <a class="form_btn" id="btn_mod_cancelar" href="../view/especialistas.php">Cancelar</a>
                            <input class="form_btn" id="btn_modificar" type="submit" name="btnModificar" Value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
