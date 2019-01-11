<?php
include 'base.html';

require_once '../clases/Encuesta.php';

$encuesta = Encuesta::buscarPorId(2);
?>

<header class="masterHead">

    <div class="container">
        <div class="row">
					<!--
        	<div class="pos-f-t">
	        	<nav class="navbar navbar-dark">
		    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
		      			<span class="navbar-toggler-icon" style="color=white;"></span>
		    		</button>
		  		</nav>
		    	<ul id="navbarMenu" class="navbar-nav mr-auto">
				     <li class="nav-item">
				         <a class="nav-link" href="#home" data-toggle="collapse" data-target=".navbar-collapse.show" style="color:white">Inicio</a>
				     </li>
				     <li class="nav-item">
				         <a class="nav-link" href="#about-us" data-toggle="collapse" data-target=".navbar-collapse.show" style="color:white">Cerrar Sesión</a>
				     </li>
				 </ul>
			 </div> -->

            <div class="col text-center">
                <h4 class="titleHead"><?php echo $encuesta->getTitulo(); ?></h4>
            </div>
        </div>
    </div>
</header>
