  
<div class="form">
<?php foreach($errores as $error): ?>

<div class="alerta error">
    <p><?php echo $error; ?></p>
</div>
<?php endforeach; ?>  
    <form action="login" class="formulario" method="POST">
        <div class="form-item">
            <label for="correo">Tu correo</label>
            <input type="text" name="correo" id="correo" autocomplete="off">
        </div>

        <div class="form-item">
            <label for="password">Contraseña</label>
            <input type="password" name="contrasena" id="password" autocomplete="off">
        </div>

        <input type="submit" value="Login" class="btn btn-verde">
    </form>
</div>