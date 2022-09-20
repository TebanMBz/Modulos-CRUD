<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();
$query = $connection->prepare("SELECT * FROM abonos");
$query->execute();
$abonos = $query->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Abonos</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="../../../Views/moduloPedidos.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="mt-5 container-fluid d-flex justify-content-center align-items-center">
            <div class="container-fluid border border-primary p-3">
                <div class="text-center text-primary mb-3">
                    <h3>INFORMACIÓN ABONOS</h3>
                </div>
                <?php foreach ($abonos as $key => $abonos) { ?>
                    <div class="container w-75 mb-4 rounded shadow border border-secondary rounded">
                        <div class="container p-4 pt-2">
                            <div class="text-center text-primary">
                                <h3>Piedra del peñol</h3>
                                <!--AGREGAR EL NOMBRE DEL PEDIDO-->
                            </div>
                            <div class="row  border border-primary rounded">
                                <div class="col text-muted p-3">
                                    <h5>ID Abono: <?php echo $abonos["id_abono"] ?> </h5>
                                    <h6>ID Pedido: <?php echo $abonos["id_pedido"] ?></h6>
                                    <h6>Monto: <?php echo $abonos["monto"] ?></h6>
                                    <h6>Fecha: <?php echo $abonos["fecha"] ?> </h6>
                                    <h6>Estado: <?php echo $abonos["estado"] ?> </h6>
                                </div>
                                <div class="col row">
                                    <div class="col-1 p-0 text-center mt-2">
                                        <div class="mb-3">
                                            <a type="buttom" href="editarAbono.php?id=<?php echo $abonos["id_abono"] ?>"><img src="../../../Views/Assets/img/editar.png" width="30px" alt="editar"></a>
                                        </div>
                                        <a type="buttom" href="eliminarAbono.php?id=<?php echo $abonos["id_abono"] ?>"><img src="../../../Views/Assets/img/eliminar.png" width="35px" alt="eliminar"></a>
                                    </div>
                                    <div class="col-11 bg-secondary d-flex justify-content-center align-items-center rounded">
                                        <img width="350px" src="data:image/jpg;base64,<?php echo base64_encode($abonos["img"]) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir Abono</h5>
                    </div>
                    <a href="agregarAbono.php"><img src="../../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>