<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="Views/Assets/Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="container w-25">
            <form class="shadow p-4 rounded border border-primary" action="Controller/access.php" method="POST">
                <div class="text-center text-primary">
                    <h3>Log In</h3>
                    <hr>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label text-secondary">Correo</label>
                    <input type="email" class="form-control " name="email" placeholder="Ingrese su correo electrónico">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label text-secondary">Contraseña</label>
                    <input type="password" class="form-control " name="password" placeholder="Ingrese su contraseña">
                </div>
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary" name="submit">Ingresar</button>
                </div>
                <?php
                error_reporting(0);

                if ($_GET['id'] == 1) {
                    echo '<div class="alert alert-danger" role="alert">
                   Los datos de acceso son invalidos
                  </div>';
                }
                ?>
            </form>
        </div>
    </div>
    
    <script src="Views/Assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>