<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Paquetes</title>
    <link rel="stylesheet" href="../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container-fluid border border-primary p-3">
                <div class="text-center text-primary mb-3">
                    <h3>INFORMACIÓN PAQUETES</h3>
                </div>
                <div class="container w-75 mb-4 rounded shadow border border-secondary rounded">
                    <div class="container p-4 pt-2">
                        <div class="text-center text-primary">
                            <h3>Santa Rosa de Osos</h3>
                            <!--AGREGAR EL NOMBRE DEL PAQUETE-->
                        </div>
                        <div class="row  border border-primary rounded">
                            <div class="col text-muted p-3">
                                <h5>ID paquete: </h5>
                                <h6>Nombre: </h6>
                                <h6>Destino: </h6>
                                <h6>Lugar de Encuentro: </h6>
                                <h6>Fecha de Partida: </h6>
                                <h6>Fecha de Regreso: </h6>
                                <h6>Cupos: </h6>
                                <h6>Precio Adultos: </h6>
                                <h6>Precio Niños: </h6>
                                <h6>Estado: </h6>
                                <h6 class="mb-0">Descripción: </h6>
                            </div>
                            <div class="col row">
                                <div class="col-1 p-0 text-center mt-2">
                                    <div class="mb-3">
                                        <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/editar.png" width="30px" alt="editar"></a>
                                    </div>
                                    <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/eliminar.png" width="35px" alt="eliminar"></a>
                                </div>
                                <div class="col-11 bg-secondary d-flex justify-content-center align-items-center rounded">
                                    <img src="" width="350px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir Paquete</h5>
                    </div>
                    <a href="agregarPaquete.php"><img src="../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!--<div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir paquete</h5>
                    </div>
                    <a href="agregarPaquete.php"><img src="../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>-->