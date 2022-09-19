<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarEmpleados.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">

                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="editarEmpleado.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Editar Empleado</h4>
                        <hr>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="nombre" class="form-label text-secondary">Nombres</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese los nombres">
                        </div>
                        <div class="col form-group">
                            <label for="apellido" class="form-label text-secondary">Apellidos</label>
                            <input type="text" name="apellido" class="form-control" placeholder="Ingrese los apellidos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="documento" class="form-label text-secondary">Documento</label>
                            <input type="text" name="documento" class="form-control" placeholder="Ingrese el documento">
                        </div>
                        <div class="col form-group">
                            <label for="telefono" class="form-label text-secondary">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" placeholder="Ingrese el telefono">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_Rol" class="form-label text-secondary">Rol</label>
                        <div class="input-group">
                            <label for="id_Rol" class="input-group-text">Roles</label>
                            <select name="id_Rol" class="form-select text-secondary">
                                <option selected disabled>Seleccione el rol</option>
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col form-group">
                            <label for="correo" class="form-label text-secondary">Correo</label>
                            <input type="email" name="correo" class="form-control text-secondary" placeholder="Ingrese su correo electrónico">
                        </div>
                        <div class="col form-group">
                            <label for="contraseña" class="form-label text-secondary">Contraseña</label>
                            <input type="password" name="contraseña" class="form-control text-secondary" placeholder="Ingrese su contraseña">
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>