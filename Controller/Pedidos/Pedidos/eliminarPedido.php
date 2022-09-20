<?php
require('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();
$id_pedido = $_GET['id'];
$consulta = $connection->prepare("DELETE FROM beneficiarios WHERE id_pedido=?");
$consulta->execute([$id_pedido]);
if ($consulta) {
    $consulta = $connection->prepare("DELETE FROM abonos WHERE id_pedido=?");
    $consulta->execute([$id_pedido]);
    if ($consulta) {
        $consulta = $connection->prepare("DELETE FROM pedidos WHERE id_pedido=?");
        $resultado = $consulta->execute([$id_pedido]);
        if ($resultado) {
            header("Location:listarPedidos.php");
        }
    }
}
