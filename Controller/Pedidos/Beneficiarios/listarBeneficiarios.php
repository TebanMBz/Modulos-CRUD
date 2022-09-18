<?php
require('../../../Model/bd.php');
$bd = new Database();
$connection = $bd->connect();

$consulta = $connection->query("SELECT * FROM beneficiarios ORDER BY id_pedido ASC");
$consulta->execute();
$beneficiarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta = $connection->query("SELECT id_pedido FROM pedidos");
$consulta->execute();
$pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Beneficiarios</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="../../../Views/moduloPedidos.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-75 px-4 pt-4 pb-3 border border-primary">
                <div class="text-center text-primary">
                    <h2>Tabla de Beneficiarios</h2>
                    <hr>
                </div>
                <table class="table table-light table-striped-columns border border-primary">
                    <tr class="text-center">
                        <th>ID_Beneficiario</th>
                        <th>ID_Pedido</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Fecha_Nac</th>
                        <th>Telefóno</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php foreach ($beneficiarios as $row) { ?>
                        <tr>
                            <td class="text-muted"><?php echo ($row['id_beneficiario']) ?></td>
                            <td class="text-muted"><?php echo ($row['id_pedido']) ?></td>
                            <td class="text-muted"><?php echo ($row['nombre']) ?></td>
                            <td class="text-muted"><?php echo ($row['apellido']) ?></td>
                            <td class="text-muted"><?php echo ($row['documento']) ?></td>
                            <td class="text-muted"><?php echo ($row['fecha_nacimiento']) ?></td>
                            <td class="text-muted"><?php echo ($row['telefono']) ?></td>
                            <td class="text-muted"><?php echo ($row['estado']) ?></td>
                            <td class="text-center"><a type="button" class="editbtn" data-bs-toggle="modal" data-bs-target="#editarBeneficiario"><img src="../../../Views/Assets/img/editar.png" width="25px" alt="editar"></a></td>
                            <td class="text-center"><a href="eliminarBeneficiario.php?id=<?php echo ($row['id_beneficiario']) ?>"><img src="../../../Views/Assets/img/eliminar.png" width="25px" alt="eliminar"></a></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir beneficiario</h5>
                    </div>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#agregarBeneficiario"><img src="../../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar-->
    <div class="modal fade" id="agregarBeneficiario" tabindex="-1" aria-labelledby="agregarBeneficiarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary">Agregar Beneficiario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="agregarBeneficiario.php" method="POST">
                    <div class="modal-body">
                        <div class="shadow-sm p-4 rounded border border-primary">
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="nombre" class="form-label text-secondary">Nombres</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese los nombres">
                                </div>
                                <div class="col form-group">
                                    <label for="apellido" class="form-label text-secondary">Apellidos</label>
                                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese los apellidos">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="documento" class="form-label text-secondary">Documento</label>
                                    <input type="text" name="documento" class="form-control" placeholder="Ingrese el documento">
                                </div>
                                <div class="col form-group">
                                    <label for="telefono" class="form-label text-secondary">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Ingrese el teléfono">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="fecha_nacimiento" class="form-label text-secondary">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control text-secondary">
                                </div>
                                <div class="col form-group">
                                    <label for="estado" class="form-label text-secondary">Estado</label>
                                    <div class="input-group">
                                        <label for="estado" class="input-group-text">Estados</label>
                                        <select name="estado" class="form-select text-secondary">
                                            <option selected disabled>Seleccione el Estado</option>
                                            <option value="1">Habilitado</option>
                                            <option value="2">Inhabilitado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_pedido" class="form-label text-secondary">Pedido</label>
                                <div class="input-group">
                                    <label for="id_pedido" class="input-group-text">Pedidos</label>
                                    <select name="id_pedido" class="form-select text-secondary">
                                        <option selected disabled>Seleccione el Pedido</option>
                                        <?php foreach ($pedidos as $option) { ?>
                                            <option value="<?php echo ($option['id_pedido']) ?>"><?php echo ($option['id_pedido']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="editarBeneficiario" tabindex="-1" aria-labelledby="editarBeneficiarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary">Editar Beneficiario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="editarBeneficiario.php" method="POST">
                    <input type="hidden" name="id" id="update_id">
                    <div class="modal-body">
                        <div class="shadow-sm p-4 rounded border border-primary">
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="nombre" class="form-label text-secondary">Nombres</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="apellido" class="form-label text-secondary">Apellidos</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="documento" class="form-label text-secondary">Documento</label>
                                    <input type="text" name="documento" id="documento" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="telefono" class="form-label text-secondary">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col form-group">
                                    <label for="fecha_nacimiento" class="form-label text-secondary">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control text-secondary">
                                </div>
                                <div class="col form-group">
                                    <label for="estado" class="form-label text-secondary">Estado</label>
                                    <div class="input-group">
                                        <label for="estado" class="input-group-text">Estados</label>
                                        <select name="estado" id="estado" class="form-select text-secondary">
                                            <option selected disabled>Seleccione el Estado</option>
                                            <option value="1">Habilitado</option>
                                            <option value="2">Inhabilitado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_pedido" class="form-label text-secondary">Pedido</label>
                                <div class="input-group">
                                    <label for="id_pedido" class="input-group-text">Pedidos</label>
                                    <select name="id_pedido" id="id_pedido" class="form-select text-secondary">
                                        <option selected disabled>Seleccione el Pedido</option>
                                        <?php foreach ($pedidos as $option) { ?>
                                            <option value="<?php echo ($option['id_pedido']) ?>"><?php echo ($option['id_pedido']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="submit" class="btn btn-primary">Guardar Cambios </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $('.editbtn').on('click', function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });
            $('#update_id').val(datos[0]);
            $('#id_pedido').val(datos[1]);
            $('#nombre').val(datos[2]);
            $('#apellido').val(datos[3]);
            $('#documento').val(datos[4]);
            $('#fecha_nacimiento').val(datos[5]);
            $('#telefono').val(datos[6]);
            $('#estado').val(datos[7]);
        });
    </script>
</body>

</html>