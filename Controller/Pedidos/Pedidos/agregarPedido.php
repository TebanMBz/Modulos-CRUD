<?php
require('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();

if (isset($_POST['submit'])) {
    $id_cliente = $_POST['id_cliente'];
    $id_paquete = $_POST['id_paquete'];
    $estado = $_POST['estado'];
    $costo_total = $_POST['costo_total'];
    $cuotas = $_POST['cuotas'];
    $consulta = $connection->prepare("INSERT INTO pedidos (id_pedido, id_cliente, id_paquete, estado,
     costo_total, cuotas) VALUES (' ', :id_cliente, :id_paquete, :estado, :costo_total, :cuotas)");
    $resultado = $consulta->execute(
        [
            'id_cliente' => $id_cliente,
            'id_paquete' => $id_paquete,
            'estado' => $estado,
            'costo_total' => $costo_total,
            'estado' => $estado,
            'cuotas' => $cuotas,
        ]
    );
    if ($resultado) {
        header("Location:listarPedidos.php");
    }
}
