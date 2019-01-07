<?php
require_once '../clases/Pregunta.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';
require_once '../clases/Opcion.php';

if(isset($_POST['guardar'])){
    $encuesta = $_POST['encuesta'];
    $listaPreguntas = Pregunta::preguntasPorEncuesta($encuesta);

    foreach ($listaPreguntas as $pregunta) {
        
    }
}
?>