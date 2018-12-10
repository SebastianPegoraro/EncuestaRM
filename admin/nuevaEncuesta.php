<?php
include 'nav.php';
?>

    <div class="container page-content-wrapper">
        <br>
        <div class="row">
            <div class="col">
                <form action="crearEncuesta.php" method="post">
                    <div class="row">
                        <div class='form-group col-sm-12 text-center'>
                            <h1>Nueva Encuesta!</h1>
                        </div>
                        <div class='form-group col-sm-12'>
                            <input type='text' class='form-control' name='titulo' placeholder='Ingrese el Titulo de la Encuesta' id='titulo' required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>