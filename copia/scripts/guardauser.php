<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <?php
        include '../class/database.php';
        $conexion = new Database();
        $conexion->conectarDB();

        extract($_POST);
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
      
        
      
 
         //DATE: YYYY-MM-DD
        
        //2021-10-08
        $cadena= "INSERT INTO persona(nombre, apellido_paterno, apellido_materno, correo,contraseña,sexo,fecha_nacimiento,telefono,tipo_usuario)
         values('$nombre','$ap_paterno','$ap_materno','$correo','$hash','$sexo','$ap_paterno',$fecha_nacimiento,null)";

        $conexion->ejecutarSQL($cadena);
        $conexion->desconectarDB();

         echo"<div class='alert alert-success'>Cliente Registrado</>";
        header("refresh:20 ../views/formlogin.php");

        ?>

    </div>

    
</body>
</html>