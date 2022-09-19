<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Abono</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarAbonos.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">


                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="agregarAbono.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Agregar Abono</h4>
                        <hr>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="id_Pedido" class="form-label text-secondary">Pedido</label>
                            <div class="input-group">
                                <label for="id_Pedido" class="input-group-text">Pedidos</label>
                                <select name="id_Pedido" class="form-select text-secondary">
                                    <option selected disabled>Selecciona el pedido</option>
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" name="monto" class="form-control" placeholder="Ingresa el monto a bonar">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="img_Abono" class="form-label text-secondary">Comprobante</label>
                        <input type="file" class="form-control" name="img_Abono">
                    </div>
                    <div class="row mb-4">
                        <div class="col form-group">
                            <label for="fecha" class="form-label text-secondary">Fecha Actual</label>
                            <input type="date" name="fecha" class="form-control text-secondary">
                        </div>
                        <div class="col form-group">
                            <label for="estado" class="form-label text-secondary">Estado</label>
                            <div class="input-group">
                                <label for="estado" class="input-group-text">Estados</label>
                                <select name="estado" class="form-select text-secondary">
                                    <option selected disabled>Seleciona un Estado</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Inhbilitado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
                    </div>
                </form>


                <!--CIERRE FORM-->


            </div>
        </div>
    </div>
    <script src="../../../Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
