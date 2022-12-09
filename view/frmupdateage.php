<?php
    include_once '../config/database.php';
    include_once 'agendar.php';
    $message = ' ';
    $id_age = $_GET['cod'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT a.id_age, a.day, a.hour, a.esp_id, a.doc_id , e.especialidad, d.pri_nom, d.pri_ape FROM agenda a INNER JOIN especialidades e ON a.esp_id=e.id_esp INNER JOIN especialistas d ON  a.doc_id=d.id_esp WHERE a.id_age=$id_age");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Agendar</title>
    <link rel="icon" href="../public/img/icocro.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="caja_popup2">
        <div  class="contenedor_popup2" id="formupdatepac">
            <form method="POST" class="form_modificar" id="formModificar"  action="../controller/updateage.php?cod=<?php echo $id_age ?>">
                <table>
                    <tr> 
                        <th colspan="2">Modificar Agenda</th>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar">Fecha</label></td>
                        <td><input class="input_modificar" type="date" name="day" value="<?php echo $result['day']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Hora</label></td>
                        <td><input class="input_modificar" type="time" name="hour" value="<?php echo $result['hour']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Especialidad</label></td>
                        <td>
                            <select class="input_registrar" name="esp_id" require readonly>
                                <option value="<?php echo $result['esp_id']; ?>"><?php echo $result['especialidad']; ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="lbl_modificar" >Doctor(a)</label></td>
                        <td>
                            <select class="input_modificar" name="doc_id" require readonly>
                                <option value="<?php echo $result['doc_id']; ?>"><?php echo $result['pri_nom'] . $result['pri_ape'];?></option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr style="text-align: center">
                        <td colspan="2">
                            <a class="form_btn" id="btn_mod_cancelar" href="../view/agendar.php">Cancelar</a>
                            <input class="form_btn" id="btn_modificar" type="submit" name="btnModificar" Value="Modificar">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
