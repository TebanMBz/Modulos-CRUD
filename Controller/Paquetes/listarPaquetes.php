<?php
require '../../Model/bd.php';

    $db = new Database();
    $connection = $db->connect();

    $query=$connection->prepare("SELECT * FROM paquetes");
    $query->execute();
    $paquetes=$query->fetchAll(PDO::FETCH_ASSOC);
 
    // foreach($libros as $key=>$libro){
    //     echo $libro["titulo"];
    //     echo $libro["autor"];
    //     echo $libro["ano"];
    //     echo $libro["ano"];
    // }
?>

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
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <div class="container-fluid border border-primary p-3">
                <div class="text-center text-primary mb-3">
                    <h3>INFORMACIÓN PAQUETES</h3>
                </div>
                
        <?php foreach($paquetes as $key=>$paquetes){ ?>
                <div class="container w-75 mb-4 rounded shadow border border-secondary rounded">
                    <div class="container p-4 pt-2">
                        <div class="text-center text-primary">
                            <h3><?php echo $paquetes["nombre"] ?></h3>
                            <!--AGREGAR EL NOMBRE DEL PAQUETE-->
                        </div>
                        <div class="row  border border-primary rounded">
                            <div class="col text-muted p-3">
                                <h5>ID paquete: <?php echo $paquetes["id_paquete"] ?> </h5>
                                <h6>Destino:  <?php echo $paquetes["destino"] ?></h6>
                                <h6>Lugar de Encuentro:  <?php echo $paquetes["lugar_encuentro"] ?></h6>
                                <h6>Fecha de Partida: <?php echo $paquetes["fecha_partida"] ?> </h6>
                                <h6>Fecha de Regreso: <?php echo $paquetes["fecha_regreso"] ?> </h6>
                                <h6>Cupos: <?php echo $paquetes["cupos"] ?></h6>
                                <h6>Precio Adultos: <?php echo $paquetes["precio_adulto"] ?> </h6>
                                <h6>Precio Niños:  <?php echo $paquetes["precio_nino"] ?></h6>
                                <h6>Estado:  <?php echo $paquetes["estado"] ?></h6>
                                <h6 class="mb-0">Descripción: <?php echo $paquetes["descripcion"] ?></h6>
                            </div>
                            <div class="col row">
                                <div class="col-1 p-0 text-center mt-2">
                                    <div class="mb-3">
                                        <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/editar.png" width="30px" alt="editar"></a>
                                    </div>
                                    <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/eliminar.png" width="35px" alt="eliminar"></a>
                                </div>
                                <div class="col-11 bg-secondary d-flex justify-content-center align-items-center rounded">
                                    <img src=" <?php echo $paquetes["img_url"] ?>" width="350px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>  
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