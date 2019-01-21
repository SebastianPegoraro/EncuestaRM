$(document).ready(function(){
    document.getElementById("pregunta1").removeAttribute("hidden");
});

function visibilidad(elemento){ //Saber que elemento se encuentra en la interfaz
  var caja = elemento.getBoundingClientRect();
  return (caja.top == 0 && caja.bottom == 0 && caja.left == 0 && caja.right == 0);
};

function buscarBoton(listaBotones){
  for(x = 0; x<listaBotones.length; x++){
  	if( listaBotones[x].id == "btn-siguiente") {
  		if ( !visibilidad(listaBotones[x]) ){
  			return listaBotones[x];
  	   }
  	}
  }
}

function buscarCajaTexto(listaTextos){
  for (var i = 0; i < listaTextos.length; i++) {
    if (!visibilidad(listaTextos[i]) ){
      return listaTextos[i];
    }
  }
}

function controlError(bandera,mensaje,boton){
  if (bandera) {
    $(boton).removeClass('disabled');
    $(boton).removeClass('bg-warning');
    $(boton).addClass('bg-primary');
    $(boton).removeAttr('title',mensaje);
    $(boton).tooltip('hide');
    controlSiguiente = true;
  }else{
    $(boton).addClass('disabled');
    $(boton).removeClass('bg-primary');
    $(boton).addClass('bg-warning');
    $(boton).attr('title',mensaje);
    $(boton).tooltip('show');
  }
}

function siguientePregunta(cont) {

var
camposRadio = document.getElementsByClassName('radios');
camposCheck = document.getElementsByClassName('checks');
camposText = buscarCajaTexto(document.getElementsByClassName('texts'));
btn = buscarBoton(document.getElementsByTagName('button'));
eltos = document.getElementsByTagName('input');
controlCheck = false;
controlRadio = false;
controlSiguiente = false;

if ( !visibilidad(camposRadio[0]) ) { //Control para los radios buttons
  for (var i = 0; i < camposRadio.length; i++) {
    if (camposRadio[i].checked) {
      controlRadio = true;
    }
  }
  textoTooltip = 'Seleccione una opcion';
  controlError(controlRadio,textoTooltip,btn);

} else {
  if (!visibilidad(camposCheck[0])) { //Control para los checkboxs
    for (var i = 0; i < camposCheck.length; i++) {
      if (camposCheck[i].checked) {
        controlCheck = true;
      }
    }
    textoTooltip = 'Seleccione, al menos, una opción';
    controlError(controlCheck,textoTooltip,btn);

  } else {
      if (!visibilidad(camposText)) { //Control para la caja de texto
        textoTooltip = 'Ingrese un texto';
        if ( !(camposText.value === '') ){
          $(btn).removeClass('disabled');
          $(btn).removeClass('bg-warning');
          $(btn).addClass('bg-primary');
          $(btn).tooltip('hide');
          controlSiguiente = true;
        }else{
          $(btn).addClass('disabled');
          $(btn).removeClass('bg-primary');
          $(btn).addClass('bg-warning');
          $(btn).attr('title', textoTooltip);
          $(btn).tooltip('show');

        }
      }
    }
}

if (controlSiguiente) {
  document.getElementById("pregunta"+cont).setAttribute("hidden", true);
  cont++;
  document.getElementById("pregunta"+cont).removeAttribute("hidden");
}
}
