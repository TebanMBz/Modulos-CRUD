<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();



if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $fecha_nac = $_POST['fecha_nac'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];


    $query = $connection->prepare("INSERT INTO usuarios (correo, contrasena, estado,id_rol) VALUES (:correo, :contrasena, 1, 3)");
    $query->execute(['correo' => $correo, 'contrasena' => $contrasena]);

    $query2 = $connection->prepare("SELECT id_usuario FROM usuarios WHERE correo=:correo");
    $query2->execute(['correo' => $correo]);
    $usuario = $query2->fetch(PDO::FETCH_ASSOC);

    $query3 = $connection->prepare("INSERT INTO clientes (id_cliente, id_usuario, nombre, apellido, documento, fecha_nacimiento, telefono, estado)
     VALUES (NULL, :id_usuario, :nombre, :apellido, :documento, :fecha_nac, :telefono, 1)");
    $query3->execute([
        'id_usuario' => $usuario['id_usuario'], 'nombre' => $nombre,
        'apellido' => $apellido, 'documento' => $documento,
        'fecha_nac' => $fecha_nac, 'telefono' => $telefono
    ]);


    header("location: listarClientes.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarClientes.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">

                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="agregarCliente.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Agregar Cliente</h4>
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
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="fecha_nac" class="form-label text-secondary">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nac" class="form-control text-secondary">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col form-group">
                            <label for="correo" class="form-label text-secondary">Correo</label>
                            <input type="email" name="correo" class="form-control text-secondary" placeholder="Ingrese su correo electrónico">
                        </div>
                        <div class="col form-group">
                            <label for="contrasena" class="form-label text-secondary">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control text-secondary" placeholder="Ingrese su contraseña">
                        </div>
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