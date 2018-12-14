<?php
include 'nav.php';
require '../clases/Pregunta.php';

$encuesta = $_GET['encuesta'];

if ($encuesta) {
    $total = Pregunta::cantPreguntasPorEncuesta($encuesta);
?>

<div class="page-content-wrapper container">
    <br>
    <div class="row">
        <div class="col">
            <form action="cargaPreguntas.php" method="post">
                <div class="row">
                    <div class='form-group col-sm-12 text-center'>
                        <h1> Pregunta N° <?php echo $total ?></h1>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-sm-12">
                            <h4>Descripción</h4>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type='text' class='form-control' name='descripcion' placeholder='Escriba TODO lo que se va a mostrar como pregunta' required>
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
                                <br>
                            </div>
                            <!-- Termina bloque de opciones -->
                            <div class='col-12 text-right'>
                                <input type='button' value='Agregar otra Opcion' class='btn btn-outline-success' onclick='add_row_opcion()'>
                            </div>
                        </div>
                    </div>
                </div>                
            </form>
        </div>
    </div>
</div>

<?php
} else {
    
}
?>

<div class="page-content-wrapper container">
    <br>
    <div class="row">
        <div class="col">
            <form action="cargaPreguntas.php" method="post">
                
            </form>
        </div>
    </div>
</div>