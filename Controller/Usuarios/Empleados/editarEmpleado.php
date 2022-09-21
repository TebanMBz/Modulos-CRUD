<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$queryRol = $connection->prepare("SELECT * FROM roles WHERE id_rol != 3");
$queryRol->execute();
$roles = $queryRol->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['idGet'])) {
    $idGet = $_GET['idGet'];
    $query = $connection->prepare("SELECT * FROM empleados WHERE id_empleado=:idGet");
    $query->execute(['idGet' => $idGet]);
    $empleado = $query->fetch(PDO::FETCH_ASSOC);

    $query2 = $connection->prepare("SELECT * FROM usuarios WHERE id_usuario=:idU");
    $query2->execute(['idU' => $empleado['id_usuario']]);
    $usuarioEmpleado = $query2->fetch(PDO::FETCH_ASSOC);
} else {
    $id_empleado = $_POST['id_empleado'];
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $id_rol = $_POST['id_rol'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];


    $query = $connection->prepare("UPDATE usuarios SET correo=:correo, contrasena=:contrasena, id_rol=:id_rol WHERE id_usuario=:id_usuario");
    $query->execute(['correo' => $correo, 'contrasena' => $contrasena, 'id_rol' => $id_rol, 'id_usuario' => $id_usuario]);

    $query2 = $connection->prepare("UPDATE empleados SET nombre=:nombre, apellido=:apellido, documento=:documento,
    telefono=:telefono WHERE id_empleado=:id_empleado");
    $query2->execute([
        'nombre' => $nombre, 'apellido' => $apellido, 'documento' => $documento,
        'telefono' => $telefono, 'id_empleado' => $id_empleado
    ]);

    header("location: listarEmpleados.php");
}



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
                        <input type="text" name="id_empleado" value="<?php echo $empleado['id_empleado'] ?>" hidden>
                        <input type="text" name="id_usuario" value="<?php echo $empleado['id_usuario'] ?>" hidden>
                        <div class="col form-group">
                            <label for="nombre" class="form-label text-secondary">Nombres</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $empleado['nombre'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="apellido" class="form-label text-secondary">Apellidos</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $empleado['apellido'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="documento" class="form-label text-secondary">Documento</label>
                            <input type="text" name="documento" class="form-control" value="<?php echo $empleado['documento'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="telefono" class="form-label text-secondary">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $empleado['telefono'] ?>">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_Rol" class="form-label text-secondary">Rol</label>
                        <div class="input-group">
                            <label for="id_rol" class="input-group-text">Roles</label>
                            <select name="id_rol" class="form-select text-secondary">
                                <?php foreach ($roles as $key => $rol) {
                                    echo '<option value="' . $rol['id_rol'] . '">' . $rol['nombre'] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col form-group">
                            <label for="correo" class="form-label text-secondary">Correo</label>
                            <input type="email" name="correo" class="form-control text-secondary" value="<?php echo $usuarioEmpleado['correo'] ?>">
                        </div>
                        <div class="col form-group">
                            <label for="contrasena" class="form-label text-secondary">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control text-secondary" value="<?php echo $usuarioEmpleado['contrasena'] ?>">
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