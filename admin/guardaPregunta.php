<?php
require_once '../clases/Pregunta.php';
require_once '../clases/Tipo.php';
require_once '../clases/Eleccion.php';
require_once '../clases/Opcion.php';

if (isset($_POST['guardar'])) {
    $descripcion = $_POST['descripcion'];//Desc de la pregunta
    $clase = $_POST['tipo'];//Clase del tipo
    $descripcionEleccion = $_POST['eleccion'];//Descrip de la Eleccion
    $encuestaId = $_POST['encuesta'];
    //Guardamos la Pregunta y obtenemos su ID
    $pregunta = new Pregunta($descripcion, $encuestaId);
    $pregunta->guardarPregunta();
    $preguntaId = $pregunta->getId();    

    for ($i=0; $i < count($clase); $i++) {
        //Se busca el id del tipo de campo seleccionado
        $tipoId = Tipo::buscarId($clase[$i]);
        //Guardamos la Descripcion de la Eleccion
        $eleccion = new Eleccion($descripcionEleccion[$i]);
        $eleccion->guardarEleccion();
        $eleccionId = $eleccion->getId();
        //Se guarda la opcion
        $opcion = new Opcion($eleccionId, $tipoId['id'], $preguntaId);
        $opcion->guardarOpcion();
    }
    
    header('Location: ./verEncuesta.php?encuesta='.$encuestaId);
}