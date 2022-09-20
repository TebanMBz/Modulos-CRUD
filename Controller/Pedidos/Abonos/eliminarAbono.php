<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$id_abono = $_GET['id'];
$consulta = $connection->prepare("DELETE FROM abonos WHERE id_abono=?");
$resultado = $consulta->execute([$id_abono]);

if($resultado){
    header("Location:listarAbonos.php");
}