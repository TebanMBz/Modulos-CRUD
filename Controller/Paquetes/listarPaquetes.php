<?php
require '../../Model/bd.php';

    $db = new Database();
    $connection = $db->connect();

    $query=$connection->prepare("SELECT * FROM paquetes");
    $query->execute();
    $paquetes=$query->fetchAll(PDO::FETCH_ASSOC);

    $query=$connection->prepare("SELECT * FROM empleados ORDER BY nombre");
    $query->execute();
    $empleados=$query->fetchAll(PDO::FETCH_ASSOC);
    
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Paquetes</title>
    <link rel="stylesheet" href="../../Views/Assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="../../Views/moduloPaquetes.php"><img src="../../Views/Assets/img/regresar.png" width="40px"
                    alt="regresar"></a>
        </div>
        <div class="container-fluid mt-5 d-flex justify-content-center align-items-center">
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
                                <h6>Destino: <?php echo $paquetes["destino"] ?></h6>
                                <h6>Lugar de Encuentro: <?php echo $paquetes["lugar_encuentro"] ?></h6>
                                <h6>Fecha de Partida: <?php echo $paquetes["fecha_partida"] ?> </h6>
                                <h6>Fecha de Regreso: <?php echo $paquetes["fecha_regreso"] ?> </h6>
                                <h6>Cupos: <?php echo $paquetes["cupos"] ?></h6>
                                <h6>Precio Adultos: <?php echo $paquetes["precio_adulto"] ?> </h6>
                                <h6>Precio Niños: <?php echo $paquetes["precio_nino"] ?></h6>
                                <h6>Estado: <?php echo $paquetes["estado"] ?></h6>
                                <h6 class="mb-0">Descripción: <?php echo $paquetes["descripcion"] ?></h6>
                            </div>
                            <div class="col row">
                                <div class="col-1 p-0 text-center mt-2">
                                    <div class="mb-3">
                                        <a href="editarPaquete.php?id_paquete= <?php echo $paquetes["id_paquete"]?>"
                                            type="button" class=" btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><img src="../../Views/Assets/img/editar.png"
                                                width="30px" alt="editar"></a>
                                    </div>
                                    <a href="eliminarPaquete.php?id_paquete=<?php echo $paquetes["id_paquete"] ?>"><img
                                            src="../../Views/Assets/img/eliminar.png" width="35px" alt="eliminar"></a>
                                </div>
                                <div
                                    class="col-11 bg-secondary d-flex justify-content-center align-items-center rounded">
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
                    <a href="agregarPaquete.php"><img src="../../Views/Assets/img/agregar.png" width="40px"
                            alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>


                    

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 950px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar paquete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class=" shadow p-4 rounded border border-primary" action="editarPaquete.php" method="POST" enctype = "multipart/form-data">
                        <div class="text-center text-primary">
                            <h3>Editar Paquete</h3>
                            <hr>
                        </div>
                        <div class="text-primary">
                            <h5>Información General</h5>
                        </div>
                        <div class="row mb-3">
                                <input type="number" hidden class="form-control " name="id_paquete" value ="<?php echo $paquetes["id_paquete"] ?>">
                            <div class="col form-group">
                                <label for="nombre" class="form-label text-secondary">Nombre</label>
                                <input type="text" class="form-control " name="nombre"
                                    placeholder="Ingrese el nombre del paquete" value ="<?php echo $paquetes["nombre"] ?>">
                            </div>
                            <div class="col form-group">
                                <label for="destino" class="form-label text-secondary">Destino</label>
                                <input type="text" class="form-control " name="destino"
                                    placeholder="Ingrese el destino principal" value ="<?php echo $paquetes["destino"] ?>">
                            </div>
                            <div class="col form-group">
                                <label for="cupos" class="form-label text-secondary">Cupos</label>
                                <input type="number" class="form-control " name="cupos"
                                    placeholder="Ingrese la cantidad de cupos" value ="<?php echo $paquetes["cupos"] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-group">
                                <label for="lugar_Encuentro" class="form-label text-secondary">Lugar de
                                    encuentro</label>
                                <input type="text" class="form-control " name="lugar_encuentro"
                                    placeholder="Ingrese el lugar de encuentro" value ="<?php echo $paquetes["lugar_encuentro"] ?>">
                            </div>
                            <div class="col form-group">
                                <label for="fec_Partida" class="form-label text-secondary">Fecha de Partida</label>
                                <input type="date" class="form-control text-secondary" name="fec_Partida"
                                    placeholder="Ingrese la fecha de partida" value ="<?php echo $paquetes["fecha_partida"] ?>">
                            </div>
                            <div class="col form-group">
                                <label for="fec_Regreso" class="form-label text-secondary">Fecha de Regreso</label>
                                <input type="date" class="form-control text-secondary" name="fec_Regreso"
                                    placeholder="Ingrese la fecha de regreso" value ="<?php echo $paquetes["fecha_regreso"] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-group">
                                <label for="img_Paquete" class="form-label text-secondary">Imagen del Paquete</label>
                                <input type="file" class="form-control text-secondary" name="img_url" value ="<?php echo $paquetes["img_url"] ?>">
                            </div>
                            <div class="col row">
                                <div class="col form-group">
                                    <label for="precio_adulto" class="form-label text-secondary">Precio por
                                        Adulto</label>
                                    <input type="number" class="form-control" name="precio_adulto" placeholder="$" value ="<?php echo $paquetes["precio_adulto"] ?>">
                                </div>
                                <div class="col form-group">
                                    <label for="precio_nino" class="form-label text-secondary">Precio por Niño</label>
                                    <input type="number" class="form-control" name="precio_nino" placeholder="$" value ="<?php echo $paquetes["precio_nino"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-group">
                                <label for="id_empleado" class="form-label text-secondary">Guía Turístico</label>
                                <div class="input-group">
                                    <label for="id_empleado" class="input-group-text">Guías Turístico</label>
                                    <select name="id_empleado" class="form-select">
                                        <option selected disabled>Selecciona un Guía Turístico</option>
                                        <?php foreach($empleados as $key=>$empleados){ ?>
                                            <option value="<?php echo $empleados["id_empleado"] ?>"><?php echo $empleados["nombre"] ?></option>
                                        <?php } ?>
                                </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col form-group">
                                <label for="estado" class="form-label text-secondary">Estado</label>
                                <div class="input-group">
                                    <label for="estado" class="input-group-text">Estados</label>
                                    <select name="estado" class="form-select">
                                        <option selected disabled>Selecciona un Estado</option>
                                        <option value="1">Habilitado</option>
                                        <option value="2">Inhabilitado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group">
                                <label for="descripción" class="form-label text-secondary">Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="3"
                                    placeholder="Redacta una breve descripción acerca del paquete y los servicios del mismo..."><?php echo $paquetes["descripcion"] ?></textarea>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

<!--<div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir paquete</h5>
                    </div>
                    <a href="agregarPaquete.php"><img src="../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>-->