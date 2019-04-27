<?php
require_once '../clases/Pregunta.php';
require_once '../clases/Opcion.php';
require_once '../clases/Encuesta.php';

if (isset($_REQUEST['encuesta']) && isset($_REQUEST['pregunta'])) {
    $listaOpciones = Opcion::opcionesPorPregunta($_REQUEST['pregunta']);
    //Se eliminan las opciones y al final la pregunta
    if ($listaOpciones) {
        foreach ($listaOpciones as $opcion) {
            Opcion::eliminar($opcion['id']);
        }
        Pregunta::eliminarPregunta($_REQUEST['pregunta']);
    }else{
        //die(var_dump($_REQUEST['encuesta']));
        Pregunta::eliminarPregunta($_REQUEST['pregunta']);
    }

    header('Location: ./verEncuesta.php?encuesta='.$_REQUEST['encuesta'].'&editado');
} else if (isset($_REQUEST['encuesta'])) {
    $listaPreguntas = Pregunta::preguntasPorEncuesta($_REQUEST['encuesta']);
    foreach ($listaPreguntas as $pregunta) {
        $listaOpciones = Opcion::opcionesPorPregunta($pregunta['id']);
        //Se eliminan las opciones y al final la pregunta
        if ($listaOpciones) {
            foreach ($listaOpciones as $opcion) {
                Opcion::eliminar($opcion['id']);
            }
            Pregunta::eliminar($_REQUEST['encuesta']);
        }else{
            //die(var_dump($_REQUEST['encuesta']));
            Pregunta::eliminar($_REQUEST['encuesta']);
        }
    }
    Encuesta::eliminar($_REQUEST['encuesta']);

    header('Location: ./listadoEncuesta.php?eliminado');
}

?>