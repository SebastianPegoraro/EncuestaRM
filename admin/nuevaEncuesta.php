<?php
include 'nav.php';
require '../clases/Tipo.php';

$tipos = Tipo::showTipos();
//die(var_dump($tipos));
?>

    <div class="container page-content-wrapper">
        <br>
        <div class="row">
            <div class="col-12">
                <form action="crearEncuesta.php" method="post">
                    <div class="row">
                        <div class='form-group col-sm-12 text-center'>
                            <h1>Nueva Encuesta!</h1>
                        </div>
                        <div class='form-group col-sm-12'>
                            <input type='text' class='form-control' name='titulo' placeholder='Ingrese el Titulo de la Encuesta' required>
                        </div>
                    </div>
                    <div class="card cuadro" id="pregunta">
                        <div class="card-header">
                            <div class="form-group col-sm-12">
                                <h4>Preguntas</h4>
                            </div>
                        </div> 
                        <div class="card-body">                                                       
                            <!-- Empieza bloque de preguntas -->
                            <div class='row rowPregunta'>
                                <div class='form-group col-sm-12'>
                                    <input type='text' class='form-control' name='pregunta[]' placeholder='Ingrese la pregunta nro 1' required>
                                </div>
                                <!-- Empieza bloque de opciones -->
                                <div class='container'>
                                    <div class='row rowOpcion'>
                                        <div class='form-group col-sm-3 col-12'>
                                            <select class='custom-select' name='tipo[]' required>
                                                <option selected disabled>Tipo de Opción</option>
                                                <option value='radio'>Radio</option>
                                                <option value='checkbox'>Check Box</option>
                                                <option value='text'>Texto</option>
                                            </select>
                                        </div>
                                        <div class='form-group col-sm-9 col-12'>
                                            <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required>
                                        </div>                                         
                                    </div>
                                    <div class='col-12 text-right'>
                                        <input type='button' value='Agregar otra Opcion' class='btn btn-outline-success' onclick='add_row_opcion()'>
                                    </div>
                                    <br>
                                </div>
                                <!-- Termina bloque de opciones -->
                            </div>
                            <!-- Termina bloque de preguntas -->
                        </div>
                        <div class="card-footer">
                            <div class='col-12 text-center'>
                                <button class='btn btn-outline-default' type="submit"> Crear Encuesta </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class='col-12 text-right'>
                <input value=' Agregar otra pregunta ' class='btn btn-outline-success' onclick='add_row_pregunta()'>
            </div>  
        </div>
    </div>

<script src='../js/agregaPregunta.js'></script>