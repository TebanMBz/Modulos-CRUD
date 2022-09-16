<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Rol</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarRoles.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-25">

                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="agregarRol.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Agregar Roles</h4>
                        <hr>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombre" class="form-label text-secondary">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group mb-4">
                        <label for="estado" class="form-label text-secondary">Estado</label>
                        <select name="estado" class="form-select text-secondary">
                            <option selected disabled>Seleccione el Estado</option>
                            <option value="1">Habilitado</option>
                            <option value="2">Inhabilitado</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>