<?php
require '../../Model/bd.php';

        $db = new Database();
        $connection = $db->connect();

        $id = $_GET["id_paquete"];

        $consulta = $connection->prepare("DELETE FROM paquetes WHERE id_paquete=?");

        $result= $consulta->execute([$id]);

        if($result){
            header("Location:listarPaquetes.php");
        }
?>
