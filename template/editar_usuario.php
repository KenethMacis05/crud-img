<!-- Modal para editar usuario -->
<div class="modal fade" id="update_user<?= $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/controllers/usuarios.controller.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id'];?>">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div style="border-radius: 50%; width: 150px; height: 150px; overflow: hidden; border: 5px solid #0D6EFD;">
                            <img src="data:image/*;base64,<?= base64_encode($user["imagen"])?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <br>
                    <label for="nombre_usuario">Nombre:</label>
                    <input value="<?= $user['nombre']?>" type="text" class="form-control" id="nombre" name="nombre">
                    <br>
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="">                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn-modificar" value="ok" class="w-100 btn btn-success mt-2">Modificar</button>
                    <button type="submit" name="btn-eliminarIMG" value="ok" class="w-100 btn btn-danger mt-2">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>