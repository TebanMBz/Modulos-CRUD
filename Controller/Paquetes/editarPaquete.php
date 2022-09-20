<?php

require '../../Model/bd.php';
$db = new Database();
$connection = $db->connect();

$id = $_POST["id_paquete"];

$consulta = $connection->prepare("SELECT * FROM paquetes WHERE id_paquete=:id");
$consulta->execute(['id'=>$id]);
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['id_paquete'])) {
    $id_paquete = $_POST['id_paquete'];
    $nombre = $_POST['nombre'];
    $destino = $_POST['destino'];    
    $cupos = $_POST['cupos'];
    $lugar_encuentro = $_POST["lugar_encuentro"];
    $fec_Partida = $_POST["fec_Partida"];
    $fec_Regreso = $_POST["fec_Regreso"];
    $precio_adulto = $_POST["precio_adulto"];
    $precio_nino = $_POST["precio_nino"];
    $id_empleado = $_POST["id_empleado"];
    $estado = $_POST["estado"];
    $descripcion = $_POST['descripcion'];

    var_dump($_FILES['img_url']);

    $img_url = $_FILES['img_url']['name'];
    $archivo = $_FILES['img_url']['tmp_name'];
    $ruta = "fotosPaquetes";
    $ruta =  $ruta.'/'. $img_url;

     move_uploaded_file($archivo, $ruta);


     if($ruta != $resultado['img_url'] && $ruta != "fotosPaquetes/"){
        move_uploaded_file($archivo,$ruta);
        $consulta = $connection->prepare("UPDATE paquetes SET id_paquete=:id_paquete, id_empleado=:id_empleado, nombre=:nombre,  destino=:destino, descripcion=:descripcion , estado=:estado , lugar_encuentro=:lugar_encuentro, fecha_Partida=:fec_Partida, fecha_Regreso=:fec_Regreso, img_url=:ruta,  cupos=:cupos, precio_adulto=:precio_adulto, precio_nino=:precio_nino WHERE id_paquete=:id_paquete");
        $resultado = $consulta->execute([  
                                    'id_paquete'=> $id_paquete,
                                   'nombre'=>$nombre,
                                   'destino'=>$destino,
                                   'cupos'=>$cupos,

                                   'lugar_encuentro'=>$lugar_encuentro,
                                   'fec_Partida'=>$fec_Partida,
                                   'fec_Regreso'=>$fec_Regreso,
                                   
                                   'ruta'=>$ruta,
                                   'precio_adulto'=>$precio_adulto,
                                   'precio_nino'=>$precio_nino,

                                   'id_empleado'=>$id_empleado,
                                   'estado'=>$estado,
                                   'descripcion'=>$descripcion
                                   ]);
    } else {
        $consulta = $connection->prepare("UPDATE paquetes SET id_paquete=:id_paquete, id_empleado=:id_empleado, nombre=:nombre,  destino=:destino, descripcion=:descripcion , estado=:estado , lugar_encuentro=:lugar_encuentro, fecha_Partida=:fec_Partida, fecha_Regreso=:fec_Regreso, img_url=:ruta,  cupos=:cupos, precio_adulto=:precio_adulto, precio_nino=:precio_nino WHERE id_paquete=:id_paquete");
        $resultado = $consulta->execute([  
                                        'id_paquete'=> $id_paquete,
                                       'nombre'=>$nombre,
                                       'destino'=>$destino,
                                       'cupos'=>$cupos,
    
                                       'lugar_encuentro'=>$lugar_encuentro,
                                       'fec_Partida'=>$fec_Partida,
                                       'fec_Regreso'=>$fec_Regreso,
                                       
                                       'ruta'=>$resultado['img_url'],
                                       'precio_adulto'=>$precio_adulto,
                                       'precio_nino'=>$precio_nino,
    
                                       'id_empleado'=>$id_empleado,
                                       'estado'=>$estado,
                                       'descripcion'=>$descripcion
                                       ]);
    }



    if($resultado) {
        $bandera = true;
    }
    
    echo "<center><h1>AGREGADO CON EXITO PAI</h1></center>";
    echo "<a href='listarPaquetes.php'>Vamo</a>";
}
    

?>