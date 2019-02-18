<?php
	require_once('Connect.php');
	require_once('Usuario.php');
	require_once('Logueo.php');

	//inicio de sesion
	session_start();
	$usuario= new Usuario();
	$login= new Login();

	if (isset($_POST['ingresar'])) { //verifica si la variable entrar está definida
		$usuario = $login->obtenerUsuario($_POST['usuario'],$_POST['pass']);
		//echo $usuario->getNombre;
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId() != NULL) {
			$_SESSION['usuario'] = $usuario; //si el usuario se encuentra, crea la sesión de usuario


			if ($usuario->getTipo() == 'administrador') {
				header('Location: ../admin/listadoEncuesta.php');
			}else{
				header('Location: ../views/content.php');
			}
			//header('Location: ../views/bodyEncuesta.php'); //direcciona a la encuesta
		}else{
			header('Location: ../views/Login.php'); // si los datos son incorrectos, permanece en login
		}
	}
	/*Para un posible boton de salir
	elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: ../views/Login.php');
		unset($_SESSION['usuario']); //destruye la sesión
	} */
?>
