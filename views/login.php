<?php
  include 'base.html';
  //require_once '../clases/Logueo.php';
  session_start();
  unset($_SESSION['usuario']);
?>
<section>
  <div class="container">
    <?php if (isset($_REQUEST['error'])) { ?>
      <div class="row">
        <div class="col alert alert-danger" role="alert">
          <h3>Error! Contacte con el administrador</h3>
        </div>
      </div>
      <?php } ?>
    <div class="row">
      <div class="col-6 offset-3">
        <form id="formLogin" method="post" action="../clases/ControllerLogin.php">
          <div class="form-group">
            <label id="labelUser">Usuario:</label>
            <input id="user" type="" class="form-control inputlg" name="usuario" placeholder="Ingrese usuario" type="text" required>
          </div>
          <div class="form-group">
            <label>Contraseña:</label>
            <input id="pass" type="password" class="form-control inputlg" name="pass" placeholder="Ingrese contraseña" required>
          </div>
          <button id="btnIngresar" type="submit" name="ingresar" class="btn btn-outline-primary">Ingresar</button>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="../js/validateLogin.js"></script>
