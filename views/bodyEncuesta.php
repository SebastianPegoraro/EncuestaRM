<?php
include 'mainEncuesta.html';
include 'headerEncuesta.php';
?>
<section>
  	<div class="row">
  		<div class="col">
    		<div class="list-group" id="list-tab" role="tablist">
    			<!--<div class="progress">  -->
    			<!--	<div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> -->
			      		<p class="list-group-item list-group-item-info " id="encabezadoForm" role="tab" aria-controls="home">Indique cada opcion que considere correcta
			      			<span id="nro_preguntas" class="badge badge-light">1/20</span>
			      		</p>
    			<!--	</div> -->
    			<!--</div> -->
		  		<form id="encuesta" class="main">
		  			<div class="from-group col-md-5 offset-md-5 col-sm-5 offset-sm-5">
						<h6 id="encuestaDescripcion"class="encuestaDescripcion text-rigth " >1 - Indique su sexo:</h6>
		  				<div class="col text-rigth">
							<div class="form-check">
								<input id="encuestaOpcion" type="radio" value="Femenino">
								<label class="tipoOpcion">Femenino</label><br>
								<input id="encuestaOpcion" type="radio" value="Masculino">
								<label class="tipoOpcion">Masculino</label><br>
								<input id="encuestaOpcion" type="radio" value="otros">
								<label class="tipoOpcion">Otros</label><br>

							</div>
		  				</div>
					</div>	
		  		</form>	  		
  			</div>
  		</div>	
	</div>
	<div class="row">
		<center>
     		<button id="btn-siguiente" type="button" class="btn btn-primary">Siguiente</button>
    	</center>
	</div>
</section>
<script src="../js/bodyEncuesta.js"></script>