<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();



if (isset($_GET['idGet'])) {
    $idGet = $_GET['idGet'];
    $query = $connection->prepare("SELECT id_usuario FROM empleados WHERE id_empleado=:idGet");
    $query->execute(['idGet' => $idGet]);
    $empleado = $query->fetch(PDO::FETCH_ASSOC);

    $query2 = $connection->prepare("DELETE FROM empleados WHERE id_empleado=:id_empelado");
    $query2->execute(['id_empelado' => $idGet]);

    $query3 = $connection->prepare("DELETE FROM usuarios WHERE id_usuario=:idU");
    $query3->execute(['idU' => $empleado['id_usuario']]);
}

header("location: listarEmpleados.php");