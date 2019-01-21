<?php
include 'header.php';

require_once '../clases/Encuesta.php';
require_once '../clases/Pregunta.php';
require_once '../clases/Opcion.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';
require_once '../clases/Controller_seguridad.php';

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

        <div class="row justify-content-between align-items-center">
            <div class="col-xs-3 column"></div>
            <div class="col-xs-4 column">
                <button id="btn-inicial" class="btn btn-primary bt-block" >Comenzar</button>
            </div>
            <div class="col-xs-3 column"></div>
        </div>

        <form id="form-encuesta" action="../admin/guardaEncuestaUsuario.php" method="post">

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
                                            <input id="radio" class="form-check-input radios" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?>' value='<?php echo $eleccion->getDescripcion() ?>' required>
                                            <label style="padding-left:20px;"><?php echo $eleccion->getDescripcion() ?></label>
                                            <?php
                                        } else if ($tipo->getClase() == 'checkbox') {
                                            ?>
                                            <div class = "col-3 col-sm-3 text-left">
                                              <input id="checkbox" class="form-check-input checks" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?><?php echo $contOpcion ?>' value='<?php echo $eleccion->getDescripcion() ?>'>
                                            </div>
                                            <div class="col-12 col-sm-6 text-left" style="padding-left:40px;">
                                              <label><?php echo $eleccion->getDescripcion() ?></label>
                                            </div>
                                            <?php
                                        } else if ($tipo->getClase() == 'text') {
                                            ?>
                                            <input id="campoText" class="form-control texts" type='<?php echo $tipo->getClase() ?>' name='opcion<?php echo $cont ?>' placeholder="<?php echo $eleccion->getDescripcion() ?>" required>
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
                      <button type="button" id="btn-anterior" class="btn btn-primary" style="display:none" onclick="anteriorPregunta('<?php echo $cont  ?>')">Anterior <i class="fas fa-arrow-left"></i></button>
                      <button type="button" id="btn-siguiente" class="btn btn-primary" onclick="siguientePregunta('<?php echo $cont ?>')" data-toggle="tooltip" data-placement="bottom">Siguiente <i class="fas fa-arrow-right"></i></button>
                    </div>

                </div>
                <?php
            } ?>

            <div class="row" id="pregunta<?php echo ++$cont ?>" hidden>
                <div class="col-12 text-center">
                    <input type='text' value='<?php echo 4 ?>' name="encuesta" hidden>
                    <input id="btn-final" type='submit' value='Terminar Encuesta!' class='btn btn-success' name="guardar">
                </div>
            </div>

        </form>
    </div>
</section>

<script src="../js/slidePreguntas.js"></script>
<script type="text/javascript">
/*
$('#btn-anterior').hide();
  $('#btn-siguiente').click(function(){
    if ( $('#btn-anterior').display == 'none' ) { //Muestra el boton empezar
      $('#btn-anterior').show();
    }
  });*/
  $('#btn-inicial').click(function(){
    $('#form-encuesta').show();
    $('#btn-inicial').hide();
  });


</script>
