<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarPedidos.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">

                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="editarPedido.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Editar Pedido</h4>
                        <hr>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-7 form-group">
                            <label for="id_Paquete" class="form-label text-secondary">Paquete</label>
                            <div class="input-group">
                                <label for="id_Paquete" class="input-group-text">Paquetes</label>
                                <select name="id_Paquete" class="form-select text-secondary">
                                    <option selected disabed>Selecciona un paquete</option>
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-5 form-group">
                            <label for="cuotas" class="form-label text-secondary">Cuotas</label>
                            <input type="number" name="cuotas" class="form-control" placeholder="Ingrese las cuotas">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-7 form-group">
                            <label for="id_Cliente" class="form-label text-secondary">Cliente</label>
                            <div class="input-group">
                                <label for="id_Cliente" class="input-group-text">Clientes</label>
                                <select name="id_Cliente" class="form-select text-secondary">
                                    <option selected disabed>Selecciona un Cliente</option>
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="2"></option>
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
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Editar</button>
                    </div>
                </form>
                <!--CIERRE FORM-->

            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>