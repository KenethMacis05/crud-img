<?php include_once 'models/conexion.model.php'; 
include_once 'models/usuarios.model.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de imagenes</title>
    <!-- Incluir Bootstrap para estilos básicos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <!-- Incluir DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <!-- Incluir Bootstrap Icons si aún no están incluidos -->
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Incluir Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Libreria Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">

        <h1 class="text-center m-5">CRUD de imagenes</h1>
        <br>
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#create_user">
            Crear usuario
        </button>         
        <br>
        <table id="miTabla" class="table table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarían los datos de las filas -->
                <?php 
                $objUser = new Usuarios();
                $allUsers = $objUser->read();                
                $numRows = mysqli_num_rows($allUsers);
                for ($i = 0; $i < $numRows; $i++) {
                    $user = mysqli_fetch_assoc($allUsers);
                ?>
                    <tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user["nombre"] ?></td>                    
                        <td>
                            <div style="border-radius: 50%; width: 30px; height: 30px; overflow: hidden;">
                                <img src="data:image/*;base64,<?= base64_encode($user["imagen"])?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>                        
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#update_user<?= $user['id'];?>">Editar</button>
                            <button class="btn btn-sm btn-danger" onclick="window.location.href = 'controllers/usuarios.controller.php?delete=<?= $user['id'];?>';">Delete</button>
                        </td>
                        <?php include "template/editar_usuario.php" ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

<?php include_once 'template/nuevo_usuario.php';?>
<?php include_once 'template/alertas.php';?>
<script>
    $(document).ready(function() {
        $('#miTabla').DataTable({
            language: {
                "lengthMenu": "Mostrar MENU registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página PAGE de PAGES",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de MAX registros totales)",
                "search": "Buscar:",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos disponibles en la tabla",
                "aria": {
                    "sortAscending": ": activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": activar para ordenar la columna de manera descendente"
                }
            },
        });
    });
</script>
</html>