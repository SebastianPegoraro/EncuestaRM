  function poner() {
    $('#myTest').addClass("required");
  }
  function quitar() {
    $('#myTest').removeAttr("required");
  }
$('document').ready(function(){
  //
  //Validar campos antes de enviar el formulario
  $('#user').blur(function(){
        var expreg = new RegExp(/^\s+|\s+$/);
        //var userinput = document.getElementById('#user').value;
        if ( (expreg.test($('#user').val() )) || ( $('#user').val() === '' ) ) {
          $('#user').addClass('is-invalid');
          $('#user').removeClass('is-valid'); 
          $("#user").required = true;
        }else{
          $('#user').addClass('is-valid'); 
          $('#user').removeClass('is-invalid'); 
        }
  });
  $('#pass').blur(function(){
    var expreg = new RegExp(/^\s+|\s+$/);
        //var userinput = document.getElementById('#user').value;
        if ( (expreg.test($('#pass').val() )) || ( $('#pass').val() === '' ) ) {
          $('#pass').addClass('is-invalid');
          $('#pass').removeClass('is-valid'); 
        }else{
          $('#pass').addClass('is-valid'); 
          $('#pass').removeClass('is-invalid'); 
        }
  });

  $('html').click(function(){
    if( ($('#user').hasClass('is-valid')) && ($('#pass').hasClass('is-valid')) ){
      $('#btnIngresar').removeClass('disabled');
    }else{
      $('#btnIngresar').addClass('disabled');
    }
  });
    
  //
    
});