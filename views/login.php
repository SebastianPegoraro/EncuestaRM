<?php
  include 'mainEncuesta.html';
?>
<section>
    <div class="login">
      <div class="container">
        <div class="row">
          <div class="from-group col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-5 offset-xs-5 border border-info">
          <div class="text-center" style="margin-top:5%;">
            <h3>Bienvenido</h3>
          </div>
            <form id="formLogin" method="post" action="">
              <div class="form-group">
                <label id="labelUser">Usuario:</label>
                <input id="user" type="" class="form-control inputlg" name="userlg" placeholder="Ingrese usuario" type="text" pattern="[A-Za-z0-9_-]{1,10}" required>
              </div>
              <div class="form-group">
                <label>Contraseña:</label>
                <input id="pass" type="password" class="form-control inputlg" name="passlg" placeholder="Ingrese contraseña" pattern="[A-Za-z0-9_-]{1,10}" required>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input id="recordarCuenta" type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="recordarCuenta">Recordar cuenta</label>
                </div>
              </div>
              <button id="btnIngresar" type="submit" class="btn btn-primary disabled">Ingresar</button>
            </form>
          </div>
        </div>

      </div>
    </div>
</section>
<script src="../js/validateLogin.js"></script>
