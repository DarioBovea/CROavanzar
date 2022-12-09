<div class="contenedor_popup">
    <form class="form_registrar" id="form_registrar" action="../controller/nuevopaciente.php" method="post">
        <div class="cont_reg">
            <label class="lbl_registrar">Tipo de documento </label>
            <select class="input_registrar" name="tip_doc" required>
                <option value="CC" selected>Cedula de Cidadania</option>
                <option value="CE">Cedula de Extrajenria</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="RC">Registro Civil</option>
            </select>
            <label class="lbl_registrar">Numero de documento </label>
            <input class="input_registrar" type="number" name="num_doc" required />
            <label class="lbl_registrar">Primer Nombre: </label>
            <input class="input_registrar" type="text" name="pri_nom" required />
            <label class="lbl_registrar">Segundo Nombre: </label>
            <input class="input_registrar" type="text" name="seg_nom" required />
            <label class="lbl_registrar">Primer Apellido: </label>
            <input class="input_registrar" type="text" name="pri_ape" required />
            <label class="lbl_registrar">Segundo Apellido: </label>
            <input class="input_registrar" type="text" name="seg_ape" required />
        </div>

        <div class="cont_reg">
            <label class="lbl_registrar">Fecha de Nacimiento: </label>
            <input class="input_registrar" type="date" name="fec_nac" required />
            <label class="lbl_registrar">Email: </label>
            <input class="input_registrar" type="email" name="email" required />
            <label class="lbl_registrar">Direccion: </label>
            <input class="input_registrar" type="text" name="dir" required />
            <label class="lbl_registrar">Telefono: </label>
            <input class="input_registrar" type="number" name="tel" required />
            <label class="lbl_registrar">Contraseña: </label>
            <input class="input_registrar" type="password" name="password" required/>
        </div>
    </form>
    <button class="form_btn" id="btn_reg" type="submit" form="form_registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">Crear Usuario</button>
    <button class="form_btn" id="btn_reg" type="button" onclick="cancelarformagr()">Cancelar</button>
</div>

<!--//////////////////////////////////////////////////-->

<script>
    function abrirformagr() {
        document.getElementById("formregistrar").style.display = "block";
    }

    function cancelarformagr() {
        document.getElementById("formregistrar").style.display = "none";
    }
</script>