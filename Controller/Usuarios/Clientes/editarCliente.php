<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();



if (isset($_GET['idGet'])) {
    $idGet = $_GET['idGet'];
    $query = $connection->prepare("SELECT * FROM clientes WHERE id_cliente=:idGet");
    $query->execute(['idGet' => $idGet]);
    $cliente = $query->fetch(PDO::FETCH_ASSOC);

    $query2 = $connection->prepare("SELECT * FROM usuarios WHERE id_usuario=:idU");
    $query2->execute(['idU' => $cliente['id_usuario']]);
    $usuarioCliente = $query2->fetch(PDO::FETCH_ASSOC);
} else {
    $id_cliente = $_POST['id_cliente'];
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $fecha_nac = $_POST['fecha_nac'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];


    $query = $connection->prepare("UPDATE usuarios SET correo=:correo, contrasena=:contrasena WHERE id_usuario=:id_usuario");
    $query->execute(['correo' => $correo, 'contrasena' => $contrasena, 'id_usuario' => $id_usuario]);

    $query2 = $connection->prepare("UPDATE clientes SET nombre=:nombre, apellido=:apellido, documento=:documento,
    telefono=:telefono, fecha_nacimiento=:fecha_nac WHERE id_cliente=:id_cliente");
    $query2->execute([
        'nombre' => $nombre, 'apellido' => $apellido, 'documento' => $documento,
        'telefono' => $telefono, 'fecha_nac' => $fecha_nac, 'id_cliente' => $id_cliente
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
    <title>Editar Cliente</title>
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
                <form class="shadow p-4 rounded border border-primary" action="editarCliente.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Editar Cliente</h4>
                        <hr>
                    </div>
                    <div class="row mb-3">
                        <input type="text" name="id_cliente" value="<?php echo $cliente['id_cliente'] ?>" hidden>
                        <input type="text" name="id_usuario" value="<?php echo $cliente['id_usuario'] ?>" hidden>
                        <div class="col form-group">
                            <label for="nombre" class="form-label text-secondary">Nombres</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $cliente['nombre'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="apellido" class="form-label text-secondary">Apellidos</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $cliente['apellido'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="documento" class="form-label text-secondary">Documento</label>
                            <input type="text" name="documento" class="form-control" value="<?php echo $cliente['documento'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="telefono" class="form-label text-secondary">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $cliente['telefono'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="fecha_nac" class="form-label text-secondary">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nac" class="form-control text-secondary" value="<?php echo $cliente['fecha_nacimiento'] ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col form-group">
                            <label for="correo" class="form-label text-secondary">Correo</label>
                            <input type="email" name="correo" class="form-control text-secondary" value="<?php echo $usuarioCliente['correo'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="contrasena" class="form-label text-secondary">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control text-secondary" value="<?php echo $usuarioCliente['contrasena'] ?>">
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>