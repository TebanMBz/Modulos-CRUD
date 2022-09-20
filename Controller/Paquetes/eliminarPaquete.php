<?php
require '../../Model/bd.php';
$db = new Database();
$connection = $db->connect();
$id = $_GET["id_paquete"];
$consulta = $connection->prepare("SELECT id_pedido FROM pedidos WHERE id_paquete=?");
$consulta->execute([$id]);
$pedidos = $consulta->fetch(PDO::FETCH_ASSOC);
$id_pedido = $pedidos['id_pedido'];
$consulta = $connection->prepare("DELETE FROM beneficiarios WHERE id_pedido=?");
$consulta->execute([$id_pedido]);
if ($consulta) {
    $consulta = $connection->prepare("DELETE FROM abonos WHERE id_pedido=?");
    $consulta->execute([$id_pedido]);
    if ($consulta) {
        $consulta = $connection->prepare("DELETE FROM pedidos WHERE id_pedido=?");
        $resultado = $consulta->execute([$id_pedido]);
        if ($resultado) {
            $consulta = $connection->prepare("DELETE FROM paquetes WHERE id_paquete=?");
            $resultado = $consulta->execute([$id]);
            if ($resultado) {
                header("Location:listarPaquetes.php");
            }
        }
    }
}
