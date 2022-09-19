<?php

require '../../Model/bd.php';
$db = new Database();
$connection = $db->connect();

$id = $_POST["id_paquete"];

$consulta = $connection->prepare("SELECT * FROM paquetes WHERE id_paquete=:id");
$consulta->execute(['id'=>$id]);
$result = $consulta->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['id_paquete'])) {
    $id_paquete = $_POST['id_paquete'];
    $nombre = $_POST['nombre'];
    $destino = $_POST['destino'];    
    $cupos = $_POST['cupos'];
    $lugar_encuentro = $_POST["lugar_encuentro"];
    $fec_Partida = $_POST["fec_Partida"];
    $fec_Regreso = $_POST["fec_Regreso"];
    $img_url = $_POST['img_url'];
    $precio_adulto = $_POST["precio_adulto"];
    $precio_nino = $_POST["precio_nino"];
    $id_empleado = $_POST["id_empleado"];
    $estado = $_POST["estado"];
    $descripcion = $_POST['descripcion'];

    $consulta = $connection->prepare("UPDATE paquetes SET id_paquete=:id_paquete, id_empleado=:id_empleado, nombre=:nombre,  destino=:destino, descripcion=:descripcion , estado=:estado , lugar_encuentro=:lugar_encuentro, fecha_Partida=:fec_Partida, fecha_Regreso=:fec_Regreso, img_url=:img_url,  cupos=:cupos, precio_adulto=:precio_adulto, precio_nino=:precio_nino WHERE id_paquete=:id_paquete");
    $resultado = $consulta->execute([  
                                    'id_paquete'=> $id_paquete,
                                   'nombre'=>$nombre,
                                   'destino'=>$destino,
                                   'cupos'=>$cupos,

                                   'lugar_encuentro'=>$lugar_encuentro,
                                   'fec_Partida'=>$fec_Partida,
                                   'fec_Regreso'=>$fec_Regreso,
                                   
                                   'img_url'=>$img_url,
                                   'precio_adulto'=>$precio_adulto,
                                   'precio_nino'=>$precio_nino,

                                   'id_empleado'=>$id_empleado,
                                   'estado'=>$estado,
                                   'descripcion'=>$descripcion
                                   ]);

    if($resultado) {
        $bandera = true;
    }
    
    echo "<center><h1>AGREGADO CON EXITO PAI</h1></center>"
}
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paquete</title>
    <link rel="stylesheet" href="../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarPaquetes.php"><img src="../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-75">

                <!--FORMULARIO-->
                <form class=" shadow p-4 rounded border border-primary" action="editarPaquete.php" method="POST">
                    <div class="text-center text-primary">
                        <h3>Editar Paquete</h3>
                        <hr>
                    </div>
                    <div class="text-primary">
                        <h5>Información General</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="nombre" class="form-label text-secondary">Nombre</label>
                            <input type="text" class="form-control " name="nombre" placeholder="Ingrese el nombre del paquete">
                        </div>
                        <div class="col form-group">
                            <label for="destino" class="form-label text-secondary">Destino</label>
                            <input type="text" class="form-control " name="destino" placeholder="Ingrese el destino principal">
                        </div>
                        <div class="col form-group">
                            <label for="cupos" class="form-label text-secondary">Cupos</label>
                            <input type="number" class="form-control " name="cupos" placeholder="Ingrese la cantidad de cupos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="lugar_Encuentro" class="form-label text-secondary">Lugar de encuentro</label>
                            <input type="text" class="form-control " name="lugar_encuentro" placeholder="Ingrese el lugar de encuentro">
                        </div>
                        <div class="col form-group">
                            <label for="fec_Partida" class="form-label text-secondary">Fecha de Partida</label>
                            <input type="date" class="form-control text-secondary" name="fec_Partida" placeholder="Ingrese la fecha de partida">
                        </div>
                        <div class="col form-group">
                            <label for="fec_Regreso" class="form-label text-secondary">Fecha de Regreso</label>
                            <input type="date" class="form-control text-secondary" name="fec_Regreso" placeholder="Ingrese la fecha de regreso">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="img_Paquete" class="form-label text-secondary">Imagen del Paquete</label>
                            <input type="file" class="form-control text-secondary" name="img_url">
                        </div>
                        <div class="col row">
                            <div class="col form-group">
                                <label for="precio_adulto" class="form-label text-secondary">Precio por Adulto</label>
                                <input type="number" class="form-control" name="precio_adulto" placeholder="$">
                            </div>
                            <div class="col form-group">
                                <label for="precio_nino" class="form-label text-secondary">Precio por Niño</label>
                                <input type="number" class="form-control" name="precio_nino" placeholder="$">
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
                                    <option value="1"><?php ?></option>
                                    <option value="2"><?php ?></option>
                                    <option value="3"><?php ?></option>
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
                            <textarea class="form-control" name="descripcion" rows="3" placeholder="Redacta una breve descripción acerca del paquete y los servicios del mismo..."></textarea>
                        </div>
                    </div>
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
