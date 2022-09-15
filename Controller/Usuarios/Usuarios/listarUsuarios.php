<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Usuarios</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="../../../Views/moduloUsuarios.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50 px-4 pt-4 pb-3 border border-primary">
                <div class="text-center text-primary">
                    <h2>Tabla de Usuarios</h2>
                    <hr>
                </div>
                <table class="table table-light table-striped-columns border border-primary">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Correo</th>
                        <th>Constraseña</th>
                        <th>Estado</th>
                        <th>ID_Rol</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tr>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted text-center"><a href="editarUsuario.php"><img src="../../../Views/Assets/img/editar.png" width="25px" alt="editar"></a></td>
                        <td class="text-muted text-center"><a href="eliminarUsuario.php"><img src="../../../Views/Assets/img/eliminar.png" width="25px" alt="eliminar"></a></td>
                    </tr>
                </table>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir usuario</h5>
                    </div>
                    <a href="agregarUsuario.php"><img src="../../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>