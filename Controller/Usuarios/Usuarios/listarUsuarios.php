<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$query = $connection->prepare("SELECT * FROM usuarios");
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
?>

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
                        <th>Contraseña</th>
                        <th>Estado</th>
                        <th>ID_Rol</th>
                    </tr>
                    <?php
                    foreach ($usuarios as $key => $usuario) {
                        echo    '<tr>
                        <td class="text-muted">' . $usuario['id_usuario'] . '</td>
                        <td class="text-muted">' . $usuario['correo'] . '</td>
                        <td class="text-muted">' . $usuario['contrasena'] . '</td>
                        <td class="text-muted">' . $usuario['estado'] . '</td>
                        <td class="text-muted">' . $usuario['id_rol'] . '</td>
                    </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>