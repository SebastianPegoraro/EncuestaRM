function add_row_pregunta(){
    $rownoPregunta=$("#pregunta .rowPregunta").length;
    $rownoPregunta=$rownoPregunta+1;
    $("#pregunta .rowPregunta:last").after("<div class='row rowPregunta' id='row"+$rownoPregunta+"'> <div class='form-group col-sm-12'> <input type='text' class='form-control' name='pregunta[]' placeholder='Ingrese la pregunta nro "+$rownoPregunta+"' required> </div><div class='container'> <div class='row'> <div class='form-group col-sm-3 col-12'> <select class='custom-select' name='tipo[]' required> <option selected disabled>Tipo de Opción</option> <option value='radio'>Radio</option> <option value='chackbox'>Check Box</option> <option value='text'>Texto</option> </select> </div><div class='form-group col-sm-9 col-12'> <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required> </div><div class='col-12 text-center'> <button class='btn btn-outline-success boton' onclick='add_row_opcion();'> Agregar otro... </button> </div></div></div><div class='form-group col-sm-12 text-right'> <button class='btn btn-outline-danger boton btn-sm' onclick=delete_row_pregunta('row"+$rownoPregunta+"')> Borrar </button></div></div>");
    //$("#tramite .row:last").after("<tr id='row"+$rownoPregunta+"'><td><input type='text' name='name[]' placeholder='Enter Name'></td><td><input type='text' name='age[]' placeholder='Enter Age'></td><td><input type='text' name='job[]' placeholder='Enter Job'></td><td><input type='button' value='DELETE' onclick=delete_row_pregunta('row"+$rownoPregunta+"')></td></tr>");
}

function delete_row_pregunta(rownoPregunta){
    $('#'+rownoPregunta).remove();
}

function add_row_opcion(){
    $rownoOpcion=$("#opcion .rowOpcion").length;
    $rownoOpcion=$rownoOpcion+1;
    $("#opcion .rowOpcion:last").after("<div class='row rowOpcion' id='row"+$rownoOpcion+"'> <div class='form-group col-sm-12'> <input type='text' class='form-control' name='pregunta[]' placeholder='Ingrese la pregunta nro "+$rownoOpcion+"' required> </div><div class='container'> <div class='row'> <div class='form-group col-sm-3 col-12'> <select class='custom-select' name='tipo[]' required> <option selected disabled>Tipo de Opción</option> <option value='radio'>Radio</option> <option value='chackbox'>Check Box</option> <option value='text'>Texto</option> </select> </div><div class='form-group col-sm-9 col-12'> <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required> </div></div></div><div class='form-group col-sm-12 text-right'> <button class='btn btn-outline-danger boton btn-sm' onclick=delete_row_opcion('row"+$rownoOpcion+"')> Borrar </button></div></div>");
    //$("#tramite .row:last").after("<tr id='row"+$rownoPregunta+"'><td><input type='text' name='name[]' placeholder='Enter Name'></td><td><input type='text' name='age[]' placeholder='Enter Age'></td><td><input type='text' name='job[]' placeholder='Enter Job'></td><td><input type='button' value='DELETE' onclick=delete_row_pregunta('row"+$rownoPregunta+"')></td></tr>");
}

function delete_row_opcion(rownoOpcion){
    $('#'+rownoOpcion).remove();
}