<div class="btn-container">
<a href="/scouts/crear" class="btn btn-verde btn-inline">Agrega un nuevo scout</a>
</div>
<div class="table-container">
    <table class="table">

    <thead >
        <tr>
            <td>Documento de identidad</td>
            <td>Nombres</td>
            <td>Telefono</td>
            <td>Unidad</td>
            <td>Rol</td>
            <td>Acciones</td>
        </tr>
            
        </thead>
        
        <tbody>

        <?php foreach($scouts as $scout): ?>

        <tr>
            <td><?php echo $scout->doc_identidad; ?></td>
            <td><?php echo $scout->nombre; ?></td>
            <td><?php echo $scout->telefono; ?></td>
            <td><?php echo $scout->unidad; ?></td>
            <td><?php echo $scout->rol; ?></td>
        </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</div>


<!-- <div class="form">
    <form action="#" method="POST" class="formulario">
        <div class="form-item">
            <label for=""></label>
        </div>
    </form>
</div> -->