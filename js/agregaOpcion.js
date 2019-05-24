function add_row_opcion(){
    $rowno=$("#pregunta .row").length;
    $rowno=$rowno+1;
    $("#pregunta .row:last").after("<div class='row rowOpcion' id='row"+$rowno+"'> <div class='form-group col-sm-8 col-12 offset-2'> <input type='text' class='form-control' name='eleccion[]' placeholder='Ingrese una descripción de la opción' required> </div><div class='form-group col-sm-2 text-right'> <button class='btn btn-outline-danger boton btn-sm' onclick=delete_row('row"+$rowno+"')> Borrar </button></div></div>");
    //$("#tramite .row:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='name[]' placeholder='Enter Name'></td><td><input type='text' name='age[]' placeholder='Enter Age'></td><td><input type='text' name='job[]' placeholder='Enter Job'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}

function delete_row(rowno){
    $('#'+rowno).remove();
}