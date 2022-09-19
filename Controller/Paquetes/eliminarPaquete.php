<?php
require '../../Model/bd.php';

        $db = new Database();
        $connection = $db->connect();

        $id = $_GET["id_paquete"];

        $consulta = $connection->prepare("DELETE FROM paquetes WHERE id_paquete=?");

        $result= $consulta->execute([$id]);

        if($result){
            echo "<h2>Registro eliminado</h2>";
        }else{
            echo "<h2>Error al eliminar</h2>";
        }
        echo "<a href='listarPaquetes.php'>Regresar</a>";
?>