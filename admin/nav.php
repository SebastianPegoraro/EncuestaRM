<?php
include 'baseAdmin.html';
?>

<div>    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">Administrador Encuesta</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../clases/ControllerLogin.php?salir">Cerrar Sesión</a>
                </div>
            </li>
        </ul>

    </nav>
</div>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="listadoEncuesta.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Encuestas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="descargas.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Descargas</span></a>
        </li>
      </ul>

