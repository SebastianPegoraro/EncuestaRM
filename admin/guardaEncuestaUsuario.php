<?php
require_once '../clases/Pregunta.php';
require_once '../clases/Tipo.php';
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
                $eleccionSeleccionado = Eleccion::buscarPorDescripcion($_POST['opcion'.$cont]);
                $seleccion = new Opcion($eleccionSeleccionado->getId(), $_POST['opcion'.$cont], $pregunta['id'], 1);
                die(var_dump($seleccion));
                $seleccion->guardarOpcion();
            } elseif ($opcion['tipo_id'] == 3) {//3 es el id del checkbox
                $cantCheckBox = Opcion::cantOpcionesCheckbox($pregunta['id'], $opcion['tipo_id']);
                for ($i=0; $i < $cantCheckBox; $i++) { 
                    $idSeleccionado = Eleccion::buscarPorDescripcion($_POST['opcion'.$cont.$i]);
                    $seleccion = new Opcion($idSeleccionado, $opcion['tipo_id'], $pregunta['id'], 1);
                    $seleccion->guardarOpcion();
                }
            } elseif ($opcion['tipo_id'] == 4) {//4 es el id del text
                $idSeleccionado = Eleccion::buscarPorDescripcion($_POST['opcion'.$cont]);
                $seleccion = new Opcion($idSeleccionado, $opcion['tipo_id'], $pregunta['id'], 1);
                $seleccion->guardarOpcion();                
            }
        }
    }
}
?>