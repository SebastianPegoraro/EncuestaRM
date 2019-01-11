<?php
include 'header.php';

require_once '../clases/Encuesta.php';
require_once '../clases/Pregunta.php';
require_once '../clases/Opcion.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';

$listaPreguntas = Pregunta::preguntasPorEncuesta(4);
//die(var_dump($preguntas));
$cont = 0;
?>

<section>
    <div class="container">

        <?php if(isset($_REQUEST['save'])){
            ?>
            <div class="row">
                <div class="col text-center">
                    <div class="alert alert-success" role="alert">
                        La encuesta se guardo Correctamente! :D
                    </div>
                </div>
            </div>
            <?php
        } ?>

        <form action="../admin/guardaEncuestaUsuario.php" method="post">

            <?php foreach($listaPreguntas as $pregunta){ //recorre la lista de preguntas para poder pintarlas
                $cont++;
                $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']); 
                $contOpcion = 0;
                ?>
                <div class="row fullscreen" id="pregunta<?php echo $cont ?>" hidden>
                    <div class="col-12">
                        <h4><?php echo $cont ?>)- <?php echo $pregunta['descripcion'] ?></h4>
                    </div>
                    
                    <?php foreach ($listaOpciones as $opcion) { //recorre la lista de opciones para poder pintarlas
                        $tipo = Tipo::buscarPorId($opcion['tipo_id']);
                        $eleccion = Eleccion::buscarPorId($opcion['eleccion_id']);
                        $contOpcion++
                        ?> 
                        <div class="col-12 text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col text-center">
                                        <?php if($tipo->getClase() == 'radio'){
                                            ?>
                                            <input class="form-check-input" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?>' value='<?php echo $eleccion->getDescripcion() ?>'>
                                            <label><?php echo $eleccion->getDescripcion() ?></label>
                                            <?php
                                        } else if ($tipo->getClase() == 'checkbox') {
                                            ?>
                                            <input class="form-check-input" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?><?php echo $contOpcion ?>' value='<?php echo $eleccion->getDescripcion() ?>'>
                                            <label><?php echo $eleccion->getDescripcion() ?></label>
                                            <?php
                                        } else if ($tipo->getClase() == 'text') {
                                            ?>
                                            <input class="form-control" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?>' placeholder="<?php echo $eleccion->getDescripcion() ?>">
                                            <?php
                                        }
                                        ?>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>

                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" onclick="siguientePregunta('<?php echo $cont ?>')">Siguiente <i class="fas fa-arrow-right"></i></button>
                    </div>

                </div>
                <?php
            } ?>

            <div class="row" id="pregunta<?php echo ++$cont ?>" hidden>
                <div class="col-12 text-center">
                    <input type='text' value='<?php echo 4 ?>' name="encuesta" hidden>
                    <input type='submit' value='Terminar Encuesta!' class='btn btn-success' name="guardar">
                </div>
            </div>

        </form>
    </div>
</section>

<script src="../js/slidePreguntas.js"></script>