<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-muted fs-3" href="navbar.php">TuristiK</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-2 fs-5">
                    <li class="nav-item">
                        <a class="nav-link" href="moduloUsuarios.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="moduloPaquetes.php">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="moduloPedidos.php">Pedidos</a>
                    </li>
                </ul>
                <a class="btn btn-outline-primary" href="../index.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
    <script src="Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>