<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo Paquetes</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="container w-50">
            <div class="text-center text-primary mb-3">
                <h1>Modulo de Paquetes.</h1>
            </div>
            <div class="container border border-primary rounded p-4">
                <div class="text-center text-muted mb-4">
                    <h3>Seleccione el CRUD que deseé ver.</h3>
                    <hr>
                </div>
                <div class="row">
                    <div class="col d-grid">
                        <a class="btn btn-outline-secondary" href="../Controller/Paquetes/listarPaquetes.php">Paquetes</a>
                    </div>
                    <div class="col d-grid">
                        <a class="btn btn-outline-secondary" href="../Controller/Usuarios/Empleados/listarEmpleados.php">Empleados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>