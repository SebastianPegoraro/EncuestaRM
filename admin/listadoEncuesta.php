<?php
require_once '../clases/Encuesta.php';
include 'nav.php';

$totalEncuestas = Encuesta::showEncuestas();
?>

    <div class="container page-content-wrapper">
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
                                    <th> Ver </th>
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
                                        <td><a href="verEncuesta.php?res=<?php echo $contenido['id'] ?>" class="btn btn-outline-primary"><i class="far fa-eye"></i></a></td>
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
                <div class="alert alert-warning" role="alert">
                    No se Encontró ninguna Encuesta! :(
                </div>
            <?php } ?>
        </div>
    </div>
