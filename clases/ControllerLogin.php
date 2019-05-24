    
<?php
	require_once './Connect.php';
	require_once './Usuario.php';
	require_once './Logueo.php';
	
	$usuario= new Usuario();
	$login= new Logueo();
    if (isset($_POST['ingresar'])) { //verifica si la variable entrar está definida
        //inicio de sesion
	    session_start();
        $usuario = $login->obtenerUsuario($_POST['usuario'],$_POST['pass']);
        //die(var_dump($usuario));
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId() != NULL) {
			$_SESSION['usuario'] = $usuario; //si el usuario se encuentra, crea la sesión de usuario
			if ($usuario->getTipo() == 'Administrador') {
				header('Location: ../admin/listadoEncuesta.php');
			}
			//header('Location: ../views/bodyEncuesta.php'); //direcciona a la encuesta
		}else{
			header('Location: ../views/login.php?error'); // si los datos son incorrectos, permanece en login
		}
	} elseif(isset($_REQUEST['salir'])){ // cuando presiona el botòn salir
		unset($_SESSION['usuario']); //destruye la sesión
		header('Location: ../views/login.php');
	} 
?>