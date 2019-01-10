<?php
require_once '../clases/Pregunta.php';
require_once '../clases/Eleccion.php';
require_once '../clases/Opcion.php';

if(isset($_POST['guardar'])){
    $encuesta = $_POST['encuesta'];
    $listaPreguntas = Pregunta::preguntasPorEncuesta($encuesta);
    $cont = 0;

    foreach ($listaPreguntas as $pregunta) {
        $cont++;
        $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']);
        
        foreach ($listaOpciones as $opcion) {
            if ($opcion['tipo_id'] == 1) {//1 es el id del radio
                $eleccionSeleccionado = Eleccion::buscarPorDescripcion($_POST['opcion'.$cont], $opcion['id']);
                $seleccion = new Opcion($eleccionSeleccionado, $opcion['tipo_id'], $pregunta['id'], 1);
                $seleccion->guardarOpcion();
            } elseif ($opcion['tipo_id'] == 3) {//3 es el id del checkbox
                $cantCheckBox = Opcion::cantOpcionesCheckbox($pregunta['id'], $opcion['tipo_id']);
                //die(var_dump($cantCheckBox));                
                for ($i=1; $i <= $cantCheckBox; $i++) { // Como el CheckBox se tiene que tomar mas de un valor, por eso tiene otra forma de guardar los datos
                    if(isset($_POST['opcion'.$cont.$i])){
                        $eleccionSeleccionado = Eleccion::buscarPorDescripcion($_POST['opcion'.$cont.$i], $opcion['id']);
                        $seleccion = new Opcion($eleccionSeleccionado, $opcion['tipo_id'], $pregunta['id'], 1);
                        $seleccion->guardarOpcion();
                    }
                }
            } elseif ($opcion['tipo_id'] == 4) {//4 es el id del text
                $eleccionSeleccionado = Eleccion::buscarIdParaText($pregunta['id'], $opcion['tipo_id']);
                $seleccion = new Opcion($eleccionSeleccionado->getId(), $opcion['tipo_id'], $pregunta['id'], $_POST['opcion'.$cont]);
                $seleccion->guardarOpcion();                
            }
        }
    }
}
?>