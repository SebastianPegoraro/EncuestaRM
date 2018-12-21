<?php
include 'header.php';

require_once '../clases/Encuesta.php';
require_once '../clases/Pregunta.php';
require_once '../clases/Opcion.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';

$listaPreguntas = Pregunta::preguntasPorEncuesta($encuesta->getId());
//die(var_dump($preguntas));
$cont = 0;
?>

<section>
    <div class="container">
        
        <?php foreach($listaPreguntas as $pregunta){ //recorre la lista de preguntas para poder pintarlas
            $cont++;
            $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']); 
            ?>
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $cont ?>)- <?php echo $pregunta['descripcion'] ?></h1>
                </div>
                
                <?php foreach ($listaOpciones as $opcion) { //recorre la lista de opciones para poder pintarlas
                    $tipo = Tipo::buscarPorId($opcion['tipo_id']);
                    $eleccion = Eleccion::buscarPorId($opcion['eleccion_id']);
                    ?> 
                    <div class="col-12 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col text-center">
                                    <?php if($tipo->getClase() == 'radio'){
                                        ?>
                                        <input type='<?php echo $tipo->getClase() ?>' name='opcion' value='<?php echo $eleccion->getDescripcion() ?>'>
                                        <label><?php echo $eleccion->getDescripcion() ?></label>
                                        <?php
                                    } else if ($tipo->getClase() == 'checkbox') {
                                        ?>
                                        <input class="form-check-input" type='<?php echo $tipo->getClase() ?>' name='opcion' value='<?php echo $eleccion->getDescripcion() ?>'>
                                        <label><?php echo $eleccion->getDescripcion() ?></label>
                                        <?php
                                    } else if ($tipo->getClase() == 'text') {
                                        ?>
                                        <input class="form-control" type='<?php echo $tipo->getClase() ?>' name='opcion' placeholder="<?php echo $eleccion->getDescripcion() ?>">
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>

            </div>
            <?php
        } ?>

    </div>
</section>