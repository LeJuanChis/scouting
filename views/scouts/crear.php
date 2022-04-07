
    <div class="btn-container">
    <a href="/admin/scouts" class="btn btn-verde btn-inline">Atras</a>
    </div>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <p><?php echo $error; ?></p>
        </div>
        <?php endforeach; ?>

<div class="form-small">

    <form action="/scouts/crear" class="formulario" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="doc_identidad">Documento de identidad</label>
            <input type="number" name="scout[doc_identidad]" id="doc_identidad">
        </div>

        <div class="form-item">
            <label for="nombres">Nombres</label>
            <input type="text" name="scout[nombres]" id="nombres">
        </div>

        <div class="form-item">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="scout[apellidos]" id="scout[apellidos]">
        </div>

        <div class="form-item">
            <label for="correo">Correo</label>
            <input type="email" name="scout[correo]" id="correo">
        </div>

        <div class="form-item">
            <label for="telefono">Telefono (No es obligatorio)</label>
            <input type="tel" name="scout[telefono]" id="telefono">
        </div>

        <div class="form-item">
            <label for="rol">Rol</label>
            <select name="scout[rol]" id="rol">
                <option value="" selected>--Selecciona--</option>
                <option value="1">Administrador</option>
                <option value="2">Scout</option>
            </select>
        </div>

        <div class="form-item">
            <label for="unidad">Unidad (No es obligatorio)</label>
            <select name="scout[unidad]" id="unidad">
                <option value="" selected>--Selecciona--</option>
                <option value="1">Sociedad</option>
                <option value="2">Clan</option>
            </select>
        </div>

        <div class="form-item">
            <label for="descripcion">Descripcion (No es obligatoria)</label>
            <textarea name="scout[descripcion]" id="descripcion"></textarea>
        </div>

        <div class="form-item">
            <label for="foto">Imagen (No es obligatoria)</label>
            <input type="file" name="foto" id="foto">
        </div>
        <input type="submit" value="Enviar" class="btn btn-verde">
    </form>
</div>