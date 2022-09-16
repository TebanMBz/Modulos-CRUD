<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Beneficiario</title>
    <link rel="stylesheet" href="../../../Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end pt-3">
            <div class="text-primary me-2">
                <h5 class="mb-1">Regresar</h5>
            </div>
            <a href="listarBeneficiarios.php"><img src="../../../Views/Assets/img/regresar.png" width="40px" alt="regresar"></a>
        </div>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="container w-50">

                <!--FORM-->
                <form class="shadow p-4 rounded border border-primary" action="agregarBeneficiario.php" method="POST">
                    <div class="text-center text-primary">
                        <h4>Agregar Beneficiario</h4>
                        <hr>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="nombres" class="form-label text-secondary">Nombres</label>
                            <input type="text" name="nombres" class="form-control" placeholder="Ingrese los nombres">
                        </div>
                        <div class="col form-group">
                            <label for="apellidos" class="form-label text-secondary">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese los apellidos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="documento" class="form-label text-secondary">Documento</label>
                            <input type="number" name="documento" class="form-control" placeholder="Ingrese el documento">
                        </div>
                        <div class="col form-group">
                            <label for="telefono" class="form-label text-secondary">Teléfono</label>
                            <input type="number" name="telefono" class="form-control" placeholder="Ingrese el teléfono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-group">
                            <label for="fecha_Nac" class="form-label text-secondary">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_Nac" class="form-control text-secondary">
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
                    <div class="form-group mb-4">
                        <label for="pedido" class="form-label text-secondary">Pedido</label>
                        <div class="input-group">
                            <label for="pedido" class="input-group-text">Pedidos</label>
                            <select name="pedido" class="form-select text-secondary">
                                <option selected disabled>Seleccione el Pedido</option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                            </select>
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