<fieldset>
    <div class="campo">
        <label for="modalidad">Modalidad en la que se inscribe *</label>

        <div class="campoRadio">
            <?php foreach ($modalidades as $modalidad) { ?>
                <div class="tupla">
                    <input type="radio" name="modalidad" value="<?php echo $modalidad[0];?>"> 
                    <label class="etiquetaModalidad"><?php echo $modalidad[1];?></label> 
                </div>
            <?php } // foreach ?>
        </div>

    </div>
    <div class="campo">
        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre">
    </div>
    <div class="campo">
        <label for="apellidos">Apellido *</label>
        <input type="text" name="apellidos">
    </div>
    <div class="campo">
        <label for="email">Email *</label>
        <input type="email" name="email">
    </div>
    <div class="campo">
        <label for="telefono">Teléfono *</label>
        <input type="tel" name="telefono">
    </div>
    <div class="campo">
        <label for="dni">DNI / Pasaporte *</label>
        <input type="text" name="dni">
    </div>
    <div class="campo">
        <label for="fNacimiento">Fecha Nacimiento *</label>
        <input type="date" name="fNacimiento">
    </div>
    <div class="campo">
        <label for="alias">Alias / A.K.A. *</label>
        <input type="text" name="alias">
    </div>

    <div class="campo">
        <label for="pais">País *</label>
        <select name="pais">
            <option value="">--- Seleccion tu país ---</option>
            <?php foreach ($paises as $pais) { ?>
                <?php if ($pais[0] == 57 ) { // España = 57 ?> 
                    <option value="<?php echo $pais[0];?>" selected><?php echo $pais[1];?></option>
                <?php } else { ?>
                    <option value="<?php echo $pais[0];?>"><?php echo $pais[1];?></option>
                <?php } // end if ?>
            <?php } // foreach ?>

        </select>
    </div>
    <div class="campoCheck">
        <label for="veterano">¿Has participado en ediciones anteriores?*</label>
        <input type="checkbox" name="veterano"> 
        <p> Marca el check si no es tu primera participación</p>
    </div>
    <div class="campo">
        <label for="sponsors">Sponsors</label>
        <textarea name="sponsors"></textarea>
    </div>
    <div class="campo">
        <label for="musica">Tú música preferída</label>
        <textarea name="musica"></textarea>
    </div>
    <div class="campo">
        <label for="instagram">Tu cuenta de Instagram</label>
        <input type="text" name="instagram">
    </div>
    <div class="campo">
        <label for="tiktok">Tu cuenta de Tik Tok </label>
        <input type="text" name="tiktok">
    </div>

</fieldset>
        
