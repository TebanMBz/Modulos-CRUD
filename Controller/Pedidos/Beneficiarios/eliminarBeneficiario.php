<?php

require('../../../Model/bd.php');
$bd = new Database();
$connection = $bd->connect();
$id = $_GET['id'];
$consulta = $connection->prepare("DELETE FROM beneficiarios WHERE id_beneficiario=?");
if ($consulta->execute([$id])) {
    header("Location:listarBeneficiarios.php");
}
