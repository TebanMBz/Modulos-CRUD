<?php
require('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();

if (isset($_POST['submit'])) {
    $id_pedido = $_POST['id_pedido'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $consulta = $connection->prepare("INSERT INTO beneficiarios (id_beneficiario, id_pedido, nombre, apellido, 
    documento, fecha_nacimiento, telefono, estado) VALUES (' ', :id_pedido, :nombre, :apellido, :documento,
     :fecha_nacimiento, :telefono, :estado)");
    $resultado = $consulta->execute(
        [
            'id_pedido' => $id_pedido,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'documento' => $documento,
            'fecha_nacimiento' => $fecha_nacimiento,
            'telefono' => $telefono,
            'estado' => $estado
        ]
    );
    if ($resultado) {
        header("Location:listarBeneficiarios.php");
    }
}
