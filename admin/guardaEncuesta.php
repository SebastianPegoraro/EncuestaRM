<?php
require_once '../clases/Encuesta.php';

if(isset($_POST['guardar'])){
    $titulo = $_POST['titulo'];
    $fechaInicio = $_POST['inicio'];
    $fechaCierre = $_POST['fin'];
    $fechaCreacion = $_POST['creacion'];

    if (isset($_POST['editar'])) {
        $encuesta = new Encuesta($titulo, $fechaInicio, $fechaCierre, $fechaCreacion, $_POST['encuesta']);
        $encuesta->guardarEncuesta();
        $encuestaId = $encuesta->getId();
    } else {
        $encuesta = new Encuesta($titulo, $fechaInicio, $fechaCierre, $fechaCreacion);
        $encuesta->guardarEncuesta();
        $encuestaId = $encuesta->getId();
    }

    header('Location: ./generadorPreguntas.php?encuesta='.$encuestaId);
}
?>