<?php
include 'nav.php';

require_once '../clases/Encuesta.php';
require_once '../clases/Pregunta.php';
require_once '../clases/Opcion.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';

$idEncuesta = $_REQUEST['encuesta'];
$encuesta = Encuesta::buscarPorId($idEncuesta);
$listaPreguntas = Pregunta::preguntasPorEncuesta($idEncuesta);
?>

<div class="container page-content-wrapper">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-head">
                    <div class="col text-center">
                        <h4><?php echo $encuesta['titulo'] ?></h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                    <?php foreach ($listaPreguntas as $pregunta) { 
                        $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']);
                        ?>
                        <div class="form-group col">
                            <label><strong>1)- <?php echo $pregunta['titulo'] ?></strong></label>
                        </div>
                        <div class="container">
                            <div class="row">

                            <?php foreach ($listaOpciones as $opcion) { 
                                $clase = Opcion::buscarPorId($opcion['tipo_id']);
                                ?> 
                                <div class="form-group col">
                                    <input class='form-check-input' type='<?php echo $clase ?>' name='opcion' value='habilitar'>
                                    <label><?php echo $opcion[0] ?></label>
                                </div>
                                <div class="form-group col-9">
                                    <label><?php echo $listaPreguntas[0] ?></label>
                                </div>
                                <?php
                            } ?>
                                
                            </div>
                        </div>
                        <?php
                    } ?> 

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>