<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

if (isset($_POST['submit'])) {
    $estado = $_POST['estado'];
    $id_abono = $_POST['id'];

    $consulta = $connection->prepare("UPDATE abonos SET estado=:estado WHERE id_abono=:id");
    $resultado = $consulta->execute(['estado' => $estado, 'id' => $id_abono]);
    header("location: listarAbonos.php");

    if ($resultado) {
        header("Location:listarAbonos.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Abono</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarAbonos.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">

                <!--FORMULARIO-->
                <form class=" shadow p-4 rounded border border-primary" action="editarAbono.php" method="POST" enctype="multipart/form-data">
                    <div class="text-center text-primary">
                        <h3>Editar estado de abono</h3>
                        <hr>
                    </div>
                    <input name="id" type="text" hidden value="<?php $id_abono = $_GET["id"];
                                                                echo $id_abono  ?>">
                    <label for="estado" class="form-label text-secondary">Estado</label>
                    <select name="estado" class="mb-4 form-select" aria-label="Default select example">
                        <option selected value="1">Revisión</option>
                        <option value="2">Aceptado</option>
                        <option value="3">Rechazado</option>
                    </select>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Editar</button>
                    </div>
                </form>
                <!--CIERRE FORMULARIO-->
            </div>
        </div>
    </div>
    <script src="../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>