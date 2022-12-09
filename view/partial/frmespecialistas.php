<div class="contenedor_popup">
    <form class="form_registrar" id="formregesp" action="../controller/nuevoespecialista.php" method="post">
        <div class="cont_reg">
            <label class="lbl_registrar">Tipo de documento </label>
            <select class="input_registrar" name="tip_doc">
                <option value="1" selected>Cedula de Cidadania</option>
                <option value="2">Cedula de Extrajenria</option>
                <option value="3">Pasaporte</option>
            </select>
            <!-- ajustar esto de los tipos en base de datos -->
            <label class="lbl_registrar">Numero de documento </label>
            <input class="input_registrar" type="number" name="num_doc" />
            <label class="lbl_registrar">Primer Nombre: </label>
            <input class="input_registrar" type="text" name="pri_nom" />
            <label class="lbl_registrar">Segundo Nombre: </label>
            <input class="input_registrar" type="text" name="seg_nom" />
            <label class="lbl_registrar">Primer Apellido: </label>
            <input class="input_registrar" type="text" name="pri_ape" />
            <label class="lbl_registrar">Segundo Apellido: </label>
            <input class="input_registrar" type="text" name="seg_ape" />
        </div>
        <div class="cont_reg">
            <label class="lbl_registrar">Fecha de Nacimiento: </label>
            <input class="input_registrar" type="date" name="fec_nac" />
            <label class="lbl_registrar">Especialidad: </label>
            <select class="input_registrar" name="esp_id">
                <option value="1">Auditoria</option>
                <option value="2">Fisioterapia Deportiva</option>
                <option value="3">Kinesiotaping</option>
                <option value="4">Medicina</option>
                <option value="5">Neurologia</option>
                <option value="6">Reumatologia</option>
                <option value="7" selected>Terapia Respiratoria</option>
            </select>
            <label class="lbl_registrar">Email: </label>
            <input class="input_registrar" type="email" name="email" />
            <label class="lbl_registrar">Direccion: </label>
            <input class="input_registrar" type="text" name="dir" />
            <label class="lbl_registrar">Telefono: </label>
            <input class="input_registrar" type="number" name="tel" />
        </div>
    </form>
    <button class="form_btn" id="btn_reg" type="submit" form="formregesp" value="Registar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">Crear Usuario</button>
    <button class="form_btn" id="btn_reg" type="button" onclick="cancelarform()">Cancelar</button>
</div>


<!--//////////////////////////////////////////////////-->

<script>
    function abrirform() {
        document.getElementById("formregistrar").style.display = "block";
    }

    function cancelarform() {
        document.getElementById("formregistrar").style.display = "none";
    }
</script>