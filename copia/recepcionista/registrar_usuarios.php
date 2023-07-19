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

            <a class="navbar-brand" href="../recepcionista/index.php">EGO GYM</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="../recepcionista/index.php" class="nav-link smoothScroll">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a href="../recepcionista/citas.php" class="nav-link smoothScroll">Citas</a>
                    </li>

                    <li class="nav-item">
                        <a href="../recepcionista/usuarios.php" class="nav-link smoothScroll">Usuarios</a>
                    </li>

                    <li class="nav-item">
                        <a href="../recepcionista/registrar_usuarios.php" class="nav-link smoothScroll">Registrar Nuevo Usuario</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding: 15%;">
    <form action="../recepcionista/guardarUsuario.php" method="post" style="background-color: black; opacity: 0.8; border-radius: 5px; padding: 5%;margin: auto; width: 80%;">
                <div class="row">
                  <legend class="form-label" style="color: goldenrod;">Registrar usuario</legend>
                  <hr class="dropdown-divider" style="height: 2px; background-color: slategray;">
                  <div class="col-12 col-lg-6">
              <label style="color: white;">Nombre</label><br>
              <input type="text" placeholder="" name="nombre" required><br>
              <label style="color: white;">Apellido Paterno</label><br>
              <input type="text" placeholder="" name="apellido_paterno" required><br>
              <label style="color: white;" >Apellido Materno</label><br>
              <input type="text" placeholder="" name="apellido_materno" required><br>
                  </div>
                 <div class="col-12 col-lg-6">
                 <label style="color: white; margin-top: 10px;">Sexo</label><br>
              <input type="radio" value="femenino" name="sexo"> <b style="color: antiquewhite;">Femenino</b><br>
              <input type="radio" value="masculino" name="sexo"> <b style="color: antiquewhite;">Masculino</b><br>
                    <br>
                    <!--Fecha nac-->
                    <label style="color:white">Fecha de nacimiento</label >
            <div class="input-group date">
            <input type="date" class="form-control" name="fecha_nacimiento">
            </div>
            <script>
        // Inicializar el selector de fecha
        $('#datepicker').datepicker({
          format: "yyyy-mm-dd",
          todayBtn: "linked",
          language: "es",
          autoclose: true,
          todayHighlight: true
        }).on('changeDate', function (e) {
          // Cuando cambia la fecha, actualizar las horas disponibles
          updateAvailableHours(e.date);
        });
      
        // Función para actualizar las horas disponibles en el campo de selección de horas
        function updateAvailableHours(selectedDate) {
          // Aquí puedes obtener las horas disponibles según la fecha seleccionada.
          // Por ejemplo, en este caso, se generarán opciones de horas para cada hora de 8 AM a 6 PM.
          const hoursSelect = $('#timeSelect');
          hoursSelect.empty();
          hoursSelect.append('<option value="">Seleccione una hora</option>');
          
          const startHour = 8;
          const endHour = 18;
          for (let hour = startHour; hour <= endHour; hour++) {
            const formattedHour = hour.toString().padStart(2, '0') + ':00';
            hoursSelect.append(`<option value="${formattedHour}">${formattedHour}</option>`);
          }
      
          // Actualizar el selector de horas después de cambiar las opciones
          hoursSelect.selectpicker('refresh');
        }
      
        // Inicializar el selector de hora
        $('#timeSelect').selectpicker();
      </script>

                    <label style="color: white;">Tipo de usuario</label><br>
                    <select name="tipo_usuario">
                        <option value="1">Cliente</option>
                        <option value="2">Empleado</option>
                    </select>
                    <br>
                 </div>
                </div>
            <hr class="dropdown-divider" style=" background-color: slategray; border:solid;">
            <button type="reset" value="Limpiar" class="btn btn-secondary">Borrar cambios</button>
            <button type="submit"name="Registrar" class="btn btn-warning" style="margin-left: 5px;">Registrar</button>         
          </form>
          <?php
          ?>
    </div>

    </body>
    
</html>