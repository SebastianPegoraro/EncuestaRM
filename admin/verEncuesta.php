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
$cont = 0;
?>

<div class="container page-content-wrapper">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <div class="col text-center">
                        <h4><?php echo $encuesta->getTitulo() ?></h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                    <?php foreach ($listaPreguntas as $pregunta) { 
                        $cont++;
                        $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']);                        
                        ?>
                        <div class="form-group col">
                            <label><strong><?php echo $cont ?>)- <?php echo $pregunta['descripcion'] ?></strong></label>
                        </div>
                        <div class="container">
                            <div class="row">

                            <?php foreach ($listaOpciones as $opcion) { 
                                $tipo = Tipo::buscarPorId($opcion['tipo_id']);
                                $eleccion = Eleccion::buscarPorId($opcion['eleccion_id']);
                                if ($tipo->getClase() == 'radio') {
                                    ?> 
                                    <div class="form-group col text-center">
                                        <input class='form-check-input' type='<?php echo $tipo->getClase() ?>' name='opcion'>
                                        <label><?php echo $eleccion->getDescripcion() ?></label>
                                    </div>
                                    <?php
                                } elseif ($tipo->getClase() == 'checkbox') {
                                    ?> 
                                    <div class="form-group col text-center">
                                        <input class='form-check-input' type='<?php echo $tipo->getClase() ?>' name='opcion'>
                                        <label><?php echo $eleccion->getDescripcion() ?></label>
                                    </div>
                                    <?php
                                } elseif ($tipo->getClase() == 'text') {
                                    ?> 
                                    <div class="form-group col text-center">
                                        <input class='form-control' type='<?php echo $tipo->getClase() ?>' name='opcion' placeholder="<?php echo $eleccion->getDescripcion() ?>">
                                    </div>
                                    <?php
                                }
                            } ?>
                                
                            </div>
                        </div>
                        <?php
                    } ?> 

                    </div>
                </div>
                
                <?php if(isset($_REQUEST['admin'])){
                    ?>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="generadorPreguntas.php?encuesta=<?php echo $idEncuesta ?>" class="btn btn-outline-primary">Agregar otra Pregunta</a>
                            </div>
                            <div class="col text-right">
                                <a href="listadoEncuesta.php" class="btn btn-outline-success">Terminar Encuesta</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>                

            </div>
        </div>
    </div>
</div>