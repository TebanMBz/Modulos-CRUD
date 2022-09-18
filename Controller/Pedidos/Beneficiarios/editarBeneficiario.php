<?php
require('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_pedido = $_POST['id_pedido'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $consulta = $connection->prepare("UPDATE beneficiarios SET id_pedido =?, nombre =?, apellido =?, documento =?,
     fecha_nacimiento =?, telefono =?, estado =? WHERE id_beneficiario =?");
    $resultado = $consulta->execute(
        [
            $id_pedido,
            $nombre,
            $apellido,
            $documento,
            $fecha_nacimiento,
            $telefono,
            $estado,
            $id
        ]
    );
    if ($resultado) {
        header("Location:listarBeneficiarios.php");
    }
}
