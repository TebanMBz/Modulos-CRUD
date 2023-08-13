<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$consulta = $connection->prepare("SELECT id_pedido FROM pedidos");
$consulta->execute();
$pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $id_pedido = $_POST['id_pedido'];
    $monto = $_POST['monto'];
    $img = addslashes($_FILES['img']['tmp_name']);
    $estado = $_POST['estado'];

    $query = $connection->prepare("INSERT INTO abonos (id_abono, id_pedido, monto,fecha,img, estado)
    VALUES (NULL,:id_pedido,:monto,NULL,:img,:estado)");


    $abonos = $query->execute(
        [
            'id_pedido' => $id_pedido,
            'monto' => $monto,
            'img' => $img,
            'estado' => $estado
        ]
    );
    if ($abonos) {
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
    <title>Agregar Abono</title>
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
                <form class=" shadow p-4 rounded border border-primary" action="agregarAbono.php" method="POST" enctype="multipart/form-data">
                    <div class="text-center text-primary">
                        <h3>Agregar Abono</h3>
                        <hr>
                    </div>
                    <div>
                        <label for="imagen" class="form-label text-secondary">Id Pedido</label>
                        <select name="id_pedido" class="mb-4 form-select" aria-label="Default select example">
                            <?php foreach ($pedidos as $opciones) {
                                echo '<option value="' . $opciones['id_pedido'] . '">' . $opciones['id_pedido'] . '</option>';
                            } ?>

                        </select>
                        <div class="mb-4">
                            <label for="monto" class="form-label text-secondary">Monto</label>
                            <input type="text" class="form-control " name="monto" placeholder="Ingrese el monto del abono">
                        </div>
                        <div class="mb-4">
                            <label for="imagen" class="form-label text-secondary">Imagen</label>
                            <input type="file" class="form-control " name="img" placeholder="Seleccione un archivo">
                        </div>
                    </div>
                    <label for="estado" class="form-label text-secondary">Estado</label>
                    <select name="estado" class="mb-4 form-select" aria-label="Default select example">
                        <option selected value="1">Revisión</option>
                        <option value="2">Aceptado</option>
                        <option value="3">Rechazado</option>
                    </select>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
                    </div>
                </form>
                <!--CIERRE FORMULARIO-->
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
