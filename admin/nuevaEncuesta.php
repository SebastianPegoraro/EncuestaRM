<?php
include 'nav.php';
require_once '../clases/Encuesta.php';

$idEncuesta = $_REQUEST['encuesta'];
$encuesta = Encuesta::buscarPorId($idEncuesta);
?>
<head>
<!-- JQueryUI para elegir fecha -->
<link rel="stylesheet" href="../vendor/jquery-ui/jquery-ui.css">
</head>

    <div class="container page-content-wrapper">
        <br>
        <div class="row">
            <div class="col">
                <form action="guardaEncuesta.php" method="post">
                    <div class="row">
                        <div class='form-group col-sm-12 text-center'>
                            <?php if (isset($_REQUEST['editar'])) { ?>
                                <h1>Nueva Encuesta!</h1>
                            <?php } else { ?>
                                <h1>Editar Encuesta!</h1>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($_REQUEST['editar'])) { ?>
                                <div class="form-group col-sm-12">
                                    <h4>Título</h4>
                                </div>
                                <div class="row pregunta">
                                    <div class="form-group col-sm-12">
                                        <input type='text' class='form-control' name='titulo' value="<?php echo $encuesta->getTitulo() ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="inicio"> Inicio: </label>
                                        <input class="form-control" type="text" id="inicio" name="inicio" value="<?php echo $encuesta->getFechaInicio() ?>" required />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fin"> Finalización: </label>
                                        <input class="form-control" type="text" id="fin" name="fin" value="<?php echo $encuesta->getFechaCierre() ?>" required />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="creacion"> Fecha de Edición: </label>
                                        <input type='text' class='form-control' name='creacion' id='creacion' required readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <input type='text' class='form-control' name='editar' id='editar' value="editar" hidden>
                                        <input type='text' class='form-control' name='encuesta' id='encuesta' value="<?php echo $encuesta->getId() ?>" hidden>
                                    </div>
                                </div> 
                            <?php } else { ?>
                                <div class="form-group col-sm-12">
                                    <h4>Título</h4>
                                </div>
                                <div class="row pregunta">
                                    <div class="form-group col-sm-12">
                                        <input type='text' class='form-control' name='titulo' placeholder='Elija un título para la nueva Encuesta' required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="inicio"> Inicio: </label>
                                        <input class="form-control" type="text" id="inicio" name="inicio" placeholder="Ingrese fecha de Inicio" required />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fin"> Finalización: </label>
                                        <input class="form-control" type="text" id="fin" name="fin" placeholder="Ingrese fecha de Finalización" required />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="creacion"> Fecha de Creación: </label>
                                        <input type='text' class='form-control' name='creacion' id='creacion' required readonly>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col-12 text-center'>
                            <input type='submit' value='Confirmar' name='guardar' class='btn btn-outline-primary'>
                        </div>            
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/currentDay.js"></script>

    <!-- JQueryUI para elegir fecha -->
	  <script src="../vendor/jquery-ui/jquery-ui.js"></script>
	  <script src="../js/locales.js"></script>
    <script>
      $( function() {
        $( "#inicio" ).datepicker({
          dateFormat: 'dd-mm-yy',
          firstDay: 7,
          changeMonth: true,
          changeYear: true,
            minDate: -20,
            maxDate: "+10Y" });
      } );
    </script>

    <script>
      $( function() {
        $( "#fin" ).datepicker({
          dateFormat: 'dd-mm-yy',
          firstDay: 7,
          changeMonth: true,
          changeYear: true });
      } );
    </script>