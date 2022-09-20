<?php
require('../../../Model/bd.php');
$db = new Database();
$connection = $db->connect();
$consulta = $connection->prepare("SELECT * FROM pedidos ORDER BY id_pedido ASC");
$consulta->execute();
$pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
$consulta = $connection->prepare("SELECT id_cliente FROM clientes");
$consulta->execute();
$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);
$consulta = $connection->prepare("SELECT id_paquete FROM paquetes");
$consulta->execute();
$paquetes = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Pedidos</title>
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
                    <h2>Tabla de Pedidos</h2>
                    <hr>
                </div>
                <table class="table table-light table-striped-columns border border-primary">
                    <tr class="text-center">
                        <th>ID_Pedido</th>
                        <th>ID_Cliente</th>
                        <th>ID_Paquete</th>
                        <th>Cuotas</th>
                        <th>Estado</th>
                        <th>Costo_Total</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php foreach ($pedidos as $row) { ?>
                        <tr>
                            <td class="text-muted"><?php echo ($row['id_pedido']) ?></td>
                            <td class="text-muted"><?php echo ($row['id_cliente']) ?></td>
                            <td class="text-muted"><?php echo ($row['id_paquete']) ?></td>
                            <td class="text-muted"><?php echo ($row['cuotas']) ?></td>
                            <td class="text-muted"><?php echo ($row['estado']) ?></td>
                            <td class="text-muted"><?php echo ($row['costo_total']) ?></td>
                            <td class="text-muted text-center"><a type="button" class="editbtn" data-bs-toggle="modal" data-bs-target="#editarPedido"><img src="../../../Views/Assets/img/editar.png" width="25px" alt="editar"></a></td>
                            <td class="text-muted text-center"><a href="eliminarPedido.php?id=<?php echo ($row['id_pedido']) ?>"><img src="../../../Views/Assets/img/eliminar.png" width="25px" alt="eliminar"></a></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="d-flex align-items-center justify-content-end">
                    <div class="text-primary me-2">
                        <h5 class="mb-0">Añadir pedido</h5>
                    </div>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#agregarPedido"><img src="../../../Views/Assets/img/agregar.png" width="40px" alt="agregar"></a>
                </div>
            </div>
        </div>

        <!--AGREGAR MODAL-->
        <div class="modal fade" id="agregarPedido" tabindex="-1" aria-labelledby="agregarPedidoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary">Agregar Pedido</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="agregarPedido.php" method="POST">
                        <div class="modal-body">
                            <div class="shadow-sm p-4 mt-0 rounded border border-primary">
                                <div class="row mb-3">
                                    <div class="col-7 form-group">
                                        <label for="id_paquete" class="form-label text-secondary">Paquete</label>
                                        <div class="input-group">
                                            <label for="id_paquete" class="input-group-text">Paquetes</label>
                                            <select name="id_paquete" class="form-select text-secondary">
                                                <option selected disabed>Selecciona un paquete</option>
                                                <?php foreach ($paquetes as $option) { ?>
                                                    <option value="<?php echo ($option['id_paquete']) ?>"><?php echo ($option['id_paquete']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="cuotas" class="form-label text-secondary">Cuotas</label>
                                        <input type="number" name="cuotas" class="form-control" placeholder="Ingrese las cuotas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-7 form-group">
                                        <label for="id_cliente" class="form-label text-secondary">Cliente</label>
                                        <div class="input-group">
                                            <label for="id_cliente" class="input-group-text">Clientes</label>
                                            <select name="id_cliente" class="form-select text-secondary">
                                                <option selected disabed>Selecciona un Cliente</option>
                                                <?php foreach ($clientes as $option) { ?>
                                                    <option value="<?php echo ($option['id_cliente']) ?>"><?php echo ($option['id_cliente']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="estado" class="form-label text-secondary">Estado</label>
                                        <div class="input-group">
                                            <label for="estado" class="input-group-text">Estados</label>
                                            <select name="estado" class="form-select text-secondary">
                                                <option selected disabed>Seleccionar</option>
                                                <option value="1">Habilitado</option>
                                                <option value="2">Inhabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="costo_total" class="form-label text-secondary">Costo total</label>
                                    <input type="number" name="costo_total" class="form-control" placeholder="Ingrese el costo total">
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
        <div class="modal fade" id="editarPedido" tabindex="-1" aria-labelledby="editarPedidoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary">Editar Pedido</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="editarPedido.php" method="POST">
                        <input type="hidden" name="id" id="update_id">
                        <div class="modal-body">
                            <div class="shadow-sm p-4 rounded border border-primary">
                                <div class="row  mb-3">
                                    <div class="col-7 form-group">
                                        <label for="id_paquete" class="form-label text-secondary">Paquete</label>
                                        <div class="input-group">
                                            <label for="id_paquete" class="input-group-text">Paquetes</label>
                                            <select name="id_paquete" id="id_paquete" class="form-select text-secondary">
                                                <option selected disabed>Selecciona un paquete</option>
                                                <?php foreach ($paquetes as $option) { ?>
                                                    <option value="<?php echo ($option['id_paquete']) ?>"><?php echo ($option['id_paquete']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="cuotas" class="form-label text-secondary">Cuotas</label>
                                        <input type="number" name="cuotas" id="cuotas" class="form-control" placeholder="Ingrese las cuotas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-7 form-group">
                                        <label for="id_cliente" class="form-label text-secondary">Cliente</label>
                                        <div class="input-group">
                                            <label for="id_cliente" class="input-group-text">Clientes</label>
                                            <select name="id_cliente" id="id_cliente" class="form-select text-secondary">
                                                <option selected disabed>Selecciona un Cliente</option>
                                                <?php foreach ($clientes as $option) { ?>
                                                    <option value="<?php echo ($option['id_cliente']) ?>"><?php echo ($option['id_cliente']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="estado" class="form-label text-secondary">Estado</label>
                                        <div class="input-group">
                                            <label for="estado" class="input-group-text">Estados</label>
                                            <select name="estado" id="estado" class="form-select text-secondary">
                                                <option selected disabed>Seleccionar</option>
                                                <option value="1">Habilitado</option>
                                                <option value="2">Inhabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="costo_total" class="form-label text-secondary">Costo total</label>
                                    <input type="number" name="costo_total" id="costo_total" class="form-control" placeholder="Ingrese el costo total">
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
                $('#id_cliente').val(datos[1]);
                $('#id_paquete').val(datos[2]);
                $('#cuotas').val(datos[3]);
                $('#estado').val(datos[4]);
                $('#costo_total').val(datos[5]);
            });
        </script>
</body>

</html>