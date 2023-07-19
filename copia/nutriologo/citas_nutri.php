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

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css" rel="stylesheet">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/egogym.css">
    </head>
    <body data-spy="scroll" data-target="#navbarNav" data-offset="50">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="../recepcionista/recepcionista_inicio.php">EGO GYM</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                        <a href="../nutriologo/index.php" class="nav-link smoothScroll">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="../nutriologo/citas_nutri.php" class="nav-link smoothScroll">Citas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--Crea pills para todas las citas, citas canceladas, confirmadas, completadas, en las tres
     filtrar citas por fecha, entrenador, servicio-->
   <div class="container" style="padding-top: 15%;">
        <h3 data-aos="fade-right">Citas agendadas</h3>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#citas_hoy">Citas del día de hoy</a></li>
            <li><a data-toggle="tab" href="#citas" style="margin-left: 20px;">Todas las citas</a></li>
        </ul>

        <div class="tab-pane fade" id="citas">
        

        </div>

        <div class="tab-pane fade" id="citas_hoy" data-aos="fade-out">
                <div class="container">
            <?php
                include '../recepcionista/database_gym.php';
                $conexion = new database();
                $conexion->conectarDB();

                $consulta = "SELECT count(citas.id_cita) as cantidad, concat(persona.nombre,' ',persona.apellido_paterno,' ',persona.apellido_materno) AS cliente, 
                e.servicio as servicio,e.empleado AS empleado, citas.hora as hora
                from citas INNER JOIN cliente ON cliente.id_cliente= citas.cliente
                INNER JOIN persona ON persona.id_persona = cliente.id_cliente
                INNER JOIN
                (
                SELECT id_empserv, concat(persona.nombre,' ',persona.apellido_paterno,' ',persona.apellido_materno) AS empleado,
                servicios.nombre as servicio 
                FROM servicios_empleados 
                INNER JOIN servicios ON servicios.codigo=servicios_empleados.servicio
                INNER JOIN empleado ON servicios_empleados.empleado=empleado.id_empleado
                INNER JOIN persona ON empleado.id_empleado = persona.id_persona
                ) AS e ON citas.serv_emp = e.id_empserv 
                where citas.fecha = curdate() AND e.servicio='nutricion'
                group by cliente
                ";
                
                $conexion->seleccionar($consulta);
                $tabla = $conexion->seleccionar($consulta);
                
                foreach($tabla as $registro)
                {
                    $registro->cantidad;

                    $cant = $registro;
                }
                if($cant != '0')
                {
                echo 
                "
                <table class='table' style='border-radius: 5px;width:60%'>
                <thead class='table-dark' style='text-align:'center;''>
                    <tr>
                    <br>
                        <th style='color: goldenrod;'>
                        Cliente
                        </th>
                        <th style='color: goldenrod;'>
                        Hora
                        </th>
                        <th style='color: goldenrod;'>
                        Ficha medica
                        </th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($tabla as $registro)
                {
                    echo "<tr>";
                    echo "<td> $registro->cliente</td> ";
                    echo "<td> $registro->hora</td> ";
                    echo "<td> <button class='btn btn-warning'>
                    Generar ficha médica</button>";
                    echo "</tr>";
                }
                echo "</tbody>
                </table>";
                $conexion->desconectarBD();
            }
            else
            {
                echo "<h2 data-aos='fade-right' style='color: goldenrod'>¡No hay citas pendientes!</h2>";
            }
                ?>
            
            </div>
        </div>
   </div>






   
    </body>
</html>