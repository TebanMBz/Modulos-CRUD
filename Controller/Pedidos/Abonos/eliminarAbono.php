<?php
require '../../../Model/bd.php';

$db = new Database();
$connection = $db->connect();

$id_abono = $_GET['id'];
$consulta = $connection->prepare("DELETE FROM abonos WHERE id_abono=?");
$resultado = $consulta->execute([$id_abono]);

if($resultado){
    echo "<h2>Registro eliminado</h2>";
}else{
    echo "<h2>Error al eliminar</h2>";
}
echo "<a href='listarAbonos.php'>Regresar</a>";