<?php
require_once '../clases/Encuesta.php';
include 'nav.php';

$totalEncuestas = Encuesta::showEncuestas();
?>

    <div class="container page-content-wrapper">
        <?php if (isset($_REQUEST['eliminado'])) {  ?>
            <div class="row">
                <div class="col alert alert-success" role="alert">
                    Se elimino correctamente la Encuesta
                </div>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <?php if($totalEncuestas){ ?> <!-- Si hay al menos una encuesta, la lista. Sino muestra una alerta -->
            <div class="card col">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Titulo </th>
                                    <th> Fecha Inicio </th>
                                    <th> Fecha Cierre </th>
                                    <th> Fecha Creación </th>
                                    <th> Acciones </th>
                                </tr>
                            </thead>
                            <?php
                            foreach($totalEncuestas as $contenido){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $contenido['titulo'] ?></td>
                                        <td><?php echo $contenido['fecha_inicio'] ?></td>
                                        <td><?php echo $contenido['fecha_cierre'] ?></td>
                                        <td><?php echo $contenido['fecha_creacion'] ?></td>
                                        <td>
                                            <a href="verEncuesta.php?encuesta=<?php echo $contenido['id'] ?>" class="btn btn-outline-info"><i class="far fa-eye"></i> Ver</a>
                                            <a href="nuevaEncuesta.php?encuesta=<?php echo $contenido['id'] ?>&editar" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            <a href="eliminar.php?encuesta=<?php echo $contenido['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-times"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>                        
                    </div>
                </div>
            </div>
            
            <?php } else { ?>
                <div class="col text-center">
                    <div class="alert alert-warning" role="alert">
                        No se Encontró ninguna Encuesta! :(
                    </div>
                </div>                
            <?php } ?>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <a href="nuevaEncuesta.php" class="btn btn-outline-primary">Crear Nueva Encuesta</a>
            </div>
        </div>
    </div>
