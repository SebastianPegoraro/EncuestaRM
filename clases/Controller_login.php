<?php 
	require_once('Connect.php');
	require_once('Usuario.php');
	require_once('Logueo.php');

	//inicio de sesion
	session_start();
	$usuario= new Usuario();
	$login= new Login();
	//verifica si la variable registrarse está definida
	//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
	/*
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($login->buscarUsuario($_POST['usuario'])) {
			$login->insertar($usuario);
			header('Location: index.php');
		}else{
			header('Location: error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}else */
	if (isset($_POST['ingresar'])) { //verifica si la variable entrar está definida
		$usuario= $login->obtenerUsuario($_POST['usuario'],$_POST['pass']);
		//echo $usuario->getNombre;
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']= $usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: ../views/bodyEncuesta.php'); //direcciona a la encuesta
		}else{
			header('Location: ../views/Login.php'); // si los datos son incorrectos, permanece en login
		}
	}
	/*Para un boton salir
	elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: ../views/Login.php');
		unset($_SESSION['usuario']); //destruye la sesión
	} */
?>