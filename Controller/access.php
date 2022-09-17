<<<<<<< HEAD
<?php
session_start();
require '../Model/bd.php';
$db=new Database;
$connection=$db->connect();

$email=$_POST['email'];
$password=$_POST['password'];

if(isset($_POST['submit'])){
    $query=$connection->prepare("SELECT * FROM usuarios");
    $query->execute();
    $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
 
foreach($usuarios as $key=>$usuario){
if($usuario['correo']== $email && $usuario['contrasena'] == $password){
    $_SESSION['correo']=$email;
header('location:../Views/moduloUsuarios.php');
} else {
header('location:../index.php?id=1');

}
    }
}

=======
>>>>>>> main
