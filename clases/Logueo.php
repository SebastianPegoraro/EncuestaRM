<?php

//importando datos para conectarse
require_once 'Connect.php';
require_once 'Usuario.php';
/*

*/
class Login{
	//obtiene el usuario para el login

		public function obtenerUsuario($nombre, $clave){
			$db= new Connect();
			$select= $db->prepare('SELECT * FROM usuarios WHERE Nombre = :nombre AND Password = :clave');
			$select->bindValue(':nombre',$nombre);
			$select->bindValue(':clave',$clave);
			$select->execute();
			$registro= $select->fetch();
			$usuario= new Usuario();
			//verifica si la clave es correcta
			//if (password_verify($clave, $registro['clave'])) {
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['idUsuario']);
				$usuario->setNombre($registro['nombre']);
				$usuario->setPassword($registro['password']);
				$usuario->setTipo($registro['tipo']);
			//}
			return $usuario;
		}
 	/*
		//busca el nombre del usuario si existe
		public function buscarUsuario($nombre){
			$db=Db::__construct();
			$select= $db->prepare('SELECT * FROM USUARIOS WHERE nombre= :nombre');
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			if($registro['Id']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}
			return $usado;
		} */
}

?>
