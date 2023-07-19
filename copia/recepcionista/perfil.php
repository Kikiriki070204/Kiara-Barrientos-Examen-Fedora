<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <title>Registrar</title>
      <!-- SCRIPTS -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/aos.js"></script>
      <script src="../js/smoothscroll.js"></script>
      <script src="../js/custom.js"></script>

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/egogym.css">
    </head>
    <body>
    <body>
    <div class="container">
    <div class="card bg-light" style="margin-top: 99px;">
        <div class="card-header bg-dark text-white">
          Informacion Personal
        </div>
        <div class="card-body row">
            <div class="col-lg-6 col-xs-12  col-sm-12 col-md-6 text-center">
            <img src="../../images/class/boxwax.jpg" class="rounded-circle" alt="..." style="width: 60%;">
        </div>
        <?php
        include '../recepcionista/database_gym.php';
        $conexion = new database();
        $conexion->conectarDB();

        extract($_POST);
          $consulta= "SELECT persona.tipo_usuario as tipo from persona where persona.id_persona=$ID";
          $conexion->seleccionar($consulta);
          $res =  $conexion->seleccionar($consulta);
            $res->tipo;
          if($res == 2)
          {
            $consulta = "SELECT concat(persona.nombre,'  ', persona.apellido_paterno,'  ', persona.apellido_materno) as nombre,
            persona.correo, persona.telefono, persona.fecha_nacimiento, persona.sexo, persona.contraseña, plan.nombre as plan,
            concat(cliente.fecha_ini,'  ','de','  ',cliente.fecha_fin) as periodo, cliente.estatus_plan as estatus from persona
            inner join cliente on persona.id_persona = cliente.id_cliente
            inner join plan on cliente.codigo_plan = plan.codigo
            where id_persona = $ID";
            $datos = $conexion ->seleccionar($consulta);
            foreach($datos as $registro)
            {
                echo "<div class='col-lg-6 col-xs-12 col-sm-12 col-md-6'>";
                echo "<p>Nombre: $registro->nombre </p>";
                echo "<p>Correo: $registro->correo </p>";
                echo "<p>Telefono: $registro->telefono </p>";
                echo "<p>Fecha de nacimiento: $registro->fecha_nacimiento </p>";
                echo "<p>Sexo: $registro->sexo </p>";
                echo "<p>Contraseña: $registro->contraseña </p>";
                echo "<p>Plan: $registro->plan </p>";
                echo "<p>Periodo: $registro->periodo </p>";
                echo "<a href='editarPerfil.php'>Editar Perfil</a>";
                echo "</div>";
    
            }    
          }


        
        ?>
    </div>
    </div>
</body>
    </body>
</html>