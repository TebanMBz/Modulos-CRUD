<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();



if (isset($_GET['idGet'])) {
    $idGet = $_GET['idGet'];
    $query = $connection->prepare("SELECT id_usuario FROM clientes WHERE id_cliente=:idGet");
    $query->execute(['idGet' => $idGet]);
    $cliente = $query->fetch(PDO::FETCH_ASSOC);

    $query2 = $connection->prepare("DELETE FROM clientes WHERE id_cliente=:id_cliente");
    $query2->execute(['id_cliente' => $idGet]);

    $query3 = $connection->prepare("DELETE FROM usuarios WHERE id_usuario=:idU");
    $query3->execute(['idU' => $cliente['id_usuario']]);
}

header("location: listarClientes.php");
