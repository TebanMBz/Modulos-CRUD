<?php
include('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();

if (isset($_POST['submit'])) {
    $id_pedido = $_POST['id'];
    $id_cliente = $_POST['id_cliente'];
    $id_paquete = $_POST['id_paquete'];
    $estado = $_POST['estado'];
    $costo_total = $_POST['costo_total'];
    $cuotas = $_POST['cuotas'];
    $consulta = $connection->prepare("UPDATE pedidos SET id_cliente=?, id_paquete=?, estado=?,
     costo_total=?, cuotas=? WHERE id_pedido=?");
    $resultado = $consulta->execute(
        [
            $id_cliente,
            $id_paquete,
            $estado,
            $costo_total,
            $cuotas,
            $id_pedido,
        ]
    );
    if ($resultado) {
        header("Location:listarPedidos.php");
    }
}
