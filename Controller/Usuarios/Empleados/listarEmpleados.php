<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$query = $connection->prepare("SELECT * FROM empleados");
$query->execute();
$empleados = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Empleados</title>
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
            <div class="container w-75 px-4 pt-4 pb-3 border border-primary">
                <div class="text-center text-primary">
                    <h2>Tabla de Empleados</h2>
                    <hr>
                </div>
                <table class="table table-light table-striped-columns border border-primary">
                    <tr class="text-center">
                        <th>ID_Empleado</th>
                        <th>ID_Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    foreach ($empleados as $key => $empleado) {
                        echo    '<tr>
                        <td class="text-muted">' . $empleado['id_empleado'] . '</td>
                        <td class="text-muted">' . $empleado['id_usuario'] . '</td>
                        <td class="text-muted">' . $empleado['nombre'] . '</td>
                        <td class="text-muted">' . $empleado['apellido'] . '</td>
                        <td class="text-muted">' . $empleado['documento'] . '</td>
                        <td class="text-muted">' . $empleado['telefono'] . '</td>
                        <td class="text-muted text-center"><a href="editarEmpleado.php?idGet=' . $empleado['id_empleado'] . '"><img src="../../../Views/Assets/img/editar.png" width="25px" alt="editar"></a></td>
                        <td class="text-muted text-center"><a href="eliminarEmpleado.php?idGet=' . $empleado['id_empleado'] . '"><img src="../../../Views/Assets/img/eliminar.png" width="25px" alt="eliminar"></a></td>
                    </tr>';
                    }
                    ?>
                </table>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir empleado</h5>
                    </div>
                    <a href="agregarEmpleado.php"><img src="../../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>