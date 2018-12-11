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
                            <input type='text' class='form-control' name='titulo' placeholder='Ingrese el Titulo de la Encuesta' required>
                        </div>
                    </div>
                    <div class="card cuadro">
                        <div class="card-body">
                            <div class="form-group col-sm-12">
                                <h4>Pregunta</h4>
                            </div>
                            <div class="row pregunta">
                                <div class="form-group col-sm-12">
                                    <input type='text' class='form-control' name='pregunta[]' placeholder='Ingrese el Titulo de la Encuesta' required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>