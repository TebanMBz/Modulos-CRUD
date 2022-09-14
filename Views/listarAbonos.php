<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Abonos</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">

        <div class="container w-75 px-4 pt-4 pb-3 border border-primary">
            <div class="text-center text-muted">
                <h2>Tabla de Abonos</h2>
                <hr>
            </div>
            <table class="table table-dark table-striped-columns table-primary border border-secondary">
                <tr class="text-center">
                    <th>ID_Abono</th>
                    <th>ID_Pedido</th>
                    <th>Cuotas</th>
                    <th>Monto</th>
                    <th>IMG</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <tr>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted"></td>
                    <td class="text-muted text-center"><a href="../Controller/Pedidos/Abonos/editarAbono.php"><img src="Assets/img/editar.png" width="25px" alt="editar"></a></td>
                    <td class="text-muted text-center"><a href="../Controller/Pedidos/Abonos/eliminarAbono.php"><img src="Assets/img/eliminar.png" width="25px" alt="eliminar"></a></td>
                </tr>
            </table>
            <div class="d-flex align-items-center justify-content-end">
                <div class="text-secondary me-2">
                    <h5 class="mb-0">Añadir abono</h5>
                </div>
                <a href="../Controller/Pedidos/Abonos/agregarAbono.php"><img src="Assets/img/agregar.png" width="40px" alt="agregar"></a>
            </div>
        </div>
    </div>
</body>

</html>