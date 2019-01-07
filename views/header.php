<?php
include 'base.html';

require_once '../clases/Encuesta.php';

$encuesta = Encuesta::buscarPorId(2);
?>

<header class="masterHead">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h4 class="titleHead"><?php echo $encuesta->getTitulo(); ?></h4>
            </div>
        </div>
    </div>
</header>

