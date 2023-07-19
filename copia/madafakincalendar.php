<?php

include '../Integradora/recepcionista/database_gym.php';
$conexion = new Database();
$conexion->conectarDB();

if(isset($_GET["ID"]))
{
  $mm = $_GET["ID"];
  $consulta = "SELECT persona.tipo_usuario from persona";
  $res= $conexion ->seleccionar($consulta);
  foreach($res as $tipo)
  {
      $tipo->tipo_usuario;
  }


  if ($tipo == '1')
  {
    $consulta = "select concat(persona.nombre,'  ', persona.apellido_paterno,'  ', persona.apellido_materno) as nombre,
  persona.correo, persona.telefono, persona.fecha_nacimiento, persona.sexo, persona.contraseña, plan.nombre as plan,
  concat(cliente.fecha_ini,'  ','de','  ',cliente.fecha_fin) as periodo, cliente.estatus_plan as estatus from persona
  inner join cliente on persona.id_persona = cliente.id_cliente
  inner join plan on cliente.codigo_plan = plan.codigo
  where id_persona = $mm";
  $datos = $conexion ->seleccionar($consulta);
  $prf= ($datos->fetch(PDO::FETCH_ASSOC));

  $user= $prf['nombre'];
  $correo= $prf['correo'];
  $tel= $prf['telefono'];
  $sexo= $prf['sexo'];
  $plan= $prf['plan'];
  $periodo= $prf['periodo'];
  $est = $prf['estatus'];

  echo "$nombre";
  }
  else if ($tipo == '2')
  {
    $consulta = "";
  $datos = $conexion ->seleccionar($consulta);
  $prf= ($datos->fetch(PDO::FETCH_ASSOC));

  $user= $prf['nombre'];
  $correo= $prf['correo'];
  $tel= $prf['telefono'];
  $sexo= $prf['sexo'];
  $plan= $prf['plan'];
  $periodo= $prf['periodo'];
  echo "$correo";
  } 
}
?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <title>Inicio</title>
      <!-- SCRIPTS -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/aos.js"></script>
      <script src="../js/smoothscroll.js"></script>
      <script src="../js/custom.js"></script>

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">
     
     <!--Calendario-->
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $(function(){
    var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '/' + mm + '/' + dd;
  })
  $( function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      dateFormat: 'yy-mm-dd',
      minDate: new Date(),
      maxDate: '+7D'
    });
   
  } );
  </script>

<link rel="stylesheet" href="../css/egogym.css">
    </head>
    <body>

        <div class="container">
        <p><input type="text" id="datepicker"></p>
        </div>

        <div class="container">
          

    <div class="card bg-light" style="margin-top: 99px;">
        <div class="card-header bg-dark text-white">
          Informacion Personal
        </div>
        <div class="card-body row">
            <div class="col-lg-6 col-xs-12  col-sm-12 col-md-6 text-center">
            <img src="../../images/class/boxwax.jpg" class="rounded-circle" alt="..." style="width: 60%;">
            <p>Nombre: <?php  ?></p>
          </div>

          <button value="1"></button>
        </div>
</html>