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