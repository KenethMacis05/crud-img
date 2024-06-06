<!-- Modal para crear usuario -->
<div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./controllers/usuarios.controller.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="nombre_usuario">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <br>
                    <label for="imagen_usuario">Imagen:</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>