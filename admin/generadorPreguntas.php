<?php
include 'nav.php';
require '../clases/Pregunta.php';

$encuesta = $_GET['encuesta'];

if ($encuesta) {
    $total = Pregunta::cantPreguntasPorEncuesta($encuesta);
?>

<div class="page-content-wrapper container">
    <br>
    <div class="row">
        <div class="col-12">
            <form action="guardaPregunta.php" method="post">

                <?php if (isset($_REQUEST['editar'])) { 
                    $preguntaId = $_REQUEST['pregunta'];
                    $pregunta = Pregunta::findPreguntaById($preguntaId);
                    //die(var_dump($pregunta));
                     ?>

                    <div class="row">
                        <div class='form-group col-sm-12 text-center'>
                            <h1> Pregunta </h1>
                        </div>
                    </div>
                    <div class="card" id="pregunta">
                        <div class="card-body">
                            <div class="form-group col-sm-12">
                                <h4>Descripción</h4>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <textarea class='form-control' name='descripcion' rows='2' required> <?php echo $pregunta['descripcion'] ?> </textarea>
                                </div>
                                <!-- Empieza bloque de opciones -->
                                <div class='container'>
                                    <div class='row rowOpcion'>
                                        <div class='form-group col-sm-4 col-12 offset-4'>
                                            <select class='custom-select' name='tipo' required>
                                                <option selected disabled>Tipo de Opción</option>
                                                <option value='radio'>Radio</option>
                                                <option value='checkbox'>Check Box</option>
                                                <option value='text'>Texto</option>
                                            </select>
                                        </div>
                                        <div class='form-group col-sm-8 col-12 offset-2'>
                                            <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required>
                                        </div>                                         
                                    </div>
                                </div>
                                <!-- Termina bloque de opciones -->
                            </div>
                        </div>
                        <input type="text" value="editar" name="editar" hidden>
                        <input type="text" value="<?php echo $preguntaId ?>" name="pregunta" hidden>                        
                    </div>

                <?php } else { ?>

                    <div class="row">
                        <div class='form-group col-sm-12 text-center'>
                            <h1> Pregunta N° <?php echo $total[0]+1 ?></h1>
                        </div>
                    </div>
                    <div class="card" id="pregunta">
                        <div class="card-body">
                            <div class="form-group col-sm-12">
                                <h4>Descripción</h4>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <textarea class='form-control' placeholder='Escriba TODO lo que se va a mostrar como pregunta' name='descripcion' rows='2' required></textarea>
                                </div>
                                <!-- Empieza bloque de opciones -->
                                <div class='container'>
                                    <div class='row rowOpcion'>
                                        <div class='form-group col-sm-4 col-12 offset-4'>
                                            <select class='custom-select' name='tipo' required>
                                                <option selected disabled>Tipo de Opción</option>
                                                <option value='radio'>Radio</option>
                                                <option value='checkbox'>Check Box</option>
                                                <option value='text'>Texto</option>
                                            </select>
                                        </div>
                                        <div class='form-group col-sm-8 col-12 offset-2'>
                                            <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required>
                                        </div>                                         
                                    </div>
                                </div>
                                <!-- Termina bloque de opciones -->
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <br>
                <div class='row'>
                    <div class='col-12 text-left'>
                        <input type="text" value="<?php echo $encuesta ?>" name="encuesta" hidden>
                        <input type='submit' value='Guardar Pregunta' name='guardar' class='btn btn-outline-primary'>
                    </div>
                </div>
            </form>
        </div>
        
        <div class='col-6 text-right'>
            <a href='listadoEncuesta.php' class="btn btn-outline-danger"><i class="fas fa-times"></i> Terminar</a>
        </div>
        <div class='col-6 text-right'>
            <input type='button' value='Agregar otra Opcion' class='btn btn-outline-success' onclick='add_row_opcion()'>
        </div>
    </div>
</div>

<script src="../js/agregaOpcion.js"></script>

<?php
} else {
    
}
?>