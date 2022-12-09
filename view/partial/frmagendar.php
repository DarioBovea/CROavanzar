<?php 
    require ('../config/database.php');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT esp.id_esp AS espID, esp.especialidad AS espNom, doc.id_esp AS docID, doc.pri_nom AS nom, doc.pri_ape AS ape FROM especialidades esp INNER JOIN especialistas doc ON doc.esp_id = esp.id_esp ORDER BY esp.especialidad, doc.pri_nom");
    // $stmt = $conn->prepare('SELECT id_esp AS espID, especialidad AS espNom FROM especialidades');
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $espNombres=array_unique(array_column($data, 'espNom'));
    $espIds=array_unique(array_column($data, 'espID'));

?>

<div class="contenedor_popup">
  <form class="form_registrar" id="form_agendar" action="../controller/agendar.php" method="post">
    <div class="cont_reg">
      <label class="lbl_registrar" for="especialidades">Especialidad</label>
      <select class="input_registrar" name="esp_id" id="especialidades">
        <option value="-1">Seleccione una especialidad</option>
          <?php
          foreach ($espNombres as $k => $espNombre) {
          ?>
              <option value="<?php echo $espIds[$k]; ?>"><?php echo $espNombre; ?></option>
          <?php
          }
          ?>
      </select>
      <label class="lbl_registrar" for="doctors">Especialista</label>
      <select class="input_registrar" name="doc_id" id="doctors" require>
        <option value="-1">Seleccione un(a) especialista</option>
      </select>
      <label class="lbl_registrar" for="fecha">Fecha inicial</label>
      <input class="input_registrar" type="date" name="day_ini" require>
      <label class="lbl_registrar" for="fecha">Fecha final</label>
      <input class="input_registrar" type="date" name="day_end" require>
    </div>
    <div class="cont_reg">
      <label class="lbl_registrar" for="hour_ini">Hora de ingreso</label>
      <input class="input_registrar" type="time" name="hour_ini" require>
      <label class="lbl_registrar" for="hour_end">Hora de salida</label>
      <input class="input_registrar" type="time" name="hour_end" require>
      <label class="lbl_registrar" for="interval">Intervalo de tiempo</label>
      <select class="input_registrar" name="interval" require>
        <option value="10 minutes">10 minutos</option>
        <option value="15 minutes" selected>15 minutos</option>
        <option value="30 minutes">30 minutos</option>
      </select>
    </div>
  </form>
  <button class="form_btn" id="btn_reg" type="submit" form="form_agendar">Crear Agenda</button>
  <button class="form_btn" id="btn_reg" type="button" onclick="cancelarform()">Cancelar</button>
</div>

<?php
  $conn=NULL;
  $stmt=NULL;
?>

<!--//////////////////////////////////////////////////-->


<script>
  function abrirform() {
      document.getElementById("formage").style.display = "block";
  }

  function cancelarform() {
      document.getElementById("formage").style.display = "none";
  }
</script>

<script type="application/javascript">
  let doctors = Array();
        <?php
        foreach($espIds as $espId) {
            $doctors = array_values(array_filter($data, function($row) use ($espId) {
                return $row['espID'] === $espId;
            } ));
            ?>
            doctors[<?php echo $espId;?>] = [ <?php
            for ($i = 0; $i < count($doctors) - 1; $i++ ) {
                ?>{ id: <?php echo $doctors[$i]['docID']; ?>, name: "<?php echo $doctors[$i]['nom'] . " " . $doctors[$i]['ape']; ?>" }, <?php
            }
            ?>{ id: <?php echo $doctors[$i]['docID']; ?>, name: "<?php echo $doctors[$i]['nom'] . " " . $doctors[$i]['ape']; ?>" } ];
        <?php
        }
        $data=NULL;
        ?>

        document.getElementById('especialidades').addEventListener('change', function(e) {
            let ownDoctors = doctors[e.target.value];
            let doctorDropdown = document.getElementById('doctors');
            doctorDropdown.innerText = null;

            ownDoctors.forEach( function(c) {
                var option = document.createElement('option');
                option.text = c.name;
                option.value = c.id;
                doctorDropdown.appendChild(option);
            } )
        });
</script>