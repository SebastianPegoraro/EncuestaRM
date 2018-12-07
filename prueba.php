<?php
    require_once 'clases/Tipo.php';

    $clase = "Radio";
$tipos = new Tipo($clase);

$tipos->guardarTipo();

//die(var_dump($idResponsable));
?>