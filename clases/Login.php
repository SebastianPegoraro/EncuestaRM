<?php 

session_start();
//importando datos para conectarse
require_once 'Usuario.php';
/**
* Clase para hacer login
* a la seccion de administracion
*/
class Login{
	//campos que alamcenan los valores 
	private $Nombre_      ="";
	private $Password_ 	 ="";
	private $Mensaje     ="";
    /**
     * [constructor recibe argumentos]
     * @param [type] $Mail    [ingresar usuario]
     * @param [type] $Pasword [Ingresar contraseña]
     */
	function __construct($Nombre,$Password){
		$this->Nombre_= $Nombre;
		$this->Password_= $Pasword;
	}

	/**
	 * [Metodo que devuelve true o false para ingresar
	 * a la encuesta
	 * ]
	 */
	public function Ingresar(){
	    //determinamos cada uno de los
	    //metodos devueltos
		if($this->ValidarUser()==false){
		 $this->Mensaje=$this->Mensaje;	
		}else{
			if($this->Pasword_usr()==false){
	         $this->Mensaje=$this->Mensaje;	
			}else{
	     		//si el logeo es correcto hace la redireccion
				if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
					$uri = 'https://encuestarm/bodyEncuesta.html';
				}else{
					$uri = 'http://encuestarm/login';
				}
			    $uri .= $_SERVER['HTTP_HOST'];

				echo    "<script type=\"text/javascript\">
				           window.location=\"".$uri";
				          </script>";

			} 
		}
	}

	/**
	 * Validamos la entrada de usuario
	 * @param [String mail]
	 */
	private function ValidarUser(){
		 $retornar= false;
		 //Validamos el formato  de correo electronico utilizando expresiones regulares
		 	//intanciando de las clases
		 	$confi= new Datos_conexion();
		 	$mysql= new mysqli($confi->host(),$confi->usuario(),$confi->pasword(),$confi->DB());
	        //Determinamos si la conexion a la bd es correcto.
		 	if(!$mysql){
	             $this->Mensaje='<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong> Error!</strong> Servidor no encontrado, vuelva a intentar mas tarde. </div>';
		 	}else{
		 		//consulta SQL para verificar si existe el usuario 
		 		  $query    = "SELECT
								Usuarios.nombre
								FROM
								Usuarios
								WHERE Usuarios.Nombre= '" $this->Nombre_"';";
		 		 $respuesta = $mysql->query($query);
		 		    //Aquí se determina con la instrucción if la consulta generada, si mayor a cero
		 		    //retornamos el valor verdadero por el contrario mensaje de error
		           if($respuesta->num_rows>0){
		           	 //asignamos el mail sanitizado  al campo Mail_
		           		// $this->Mail_=$mailfilter;
		           		 $retornar=true;// se retorna un valor verdadero
		           		
		           }else {
	                 $this->Mensaje='<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong> Error!</strong> Correo inexistente. </div>';
		           }
		 	}

		 	//Se muestra al usuario el mensaje de error sobre
		 	//el formato de correo
		 	/*
	         $this->Mensaje='<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong> Error!</strong> El correo que ingresaste no tiene formato correcto. </div>'; */
	return $retornar;
	}

	/**
	 * Método para determinar
	 * la existencia de la contraseña y verificación 
	 * @param [type] $pasword [ingresar contraseña]
	 */
	private function Pasword_usr(){
		$retornar = false;
		//saneamos la entrada de los caracteres
		$contra   = filter_var($this->Password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_ENCODE_AMP);
		if($contra==""){
		//si es que no existe ninguna contraseña, mostramos el mensaje de error
		$this->Mensaje='<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong> Error!</strong> Escriba su contraseña. </div>';	
		}else{
			//Realizamos la consulta sql a la bd
			//y verificamos la contraseña
	       	//$ontrasena = new PasswordHash(15, FALSE)C;
	        $query="SELECT
					Usuarios.id,
					Usuarios.Nombre,
					Usuarios.Contrasena,
					FROM
					Usuarios
					WHERE Usuarios.Correo='".$this->Mail_."'";
			//instancia de las clases
			$confi=new Datos_conexion();
		 	$mysql=new mysqli($confi->host(),$confi->usuario(),$confi->pasword(),$confi->DB());
		 	$respuesta = $mysql->query($query);//se ejecuta la consulta SQL
		 	//Se determina con la instrucion if si es que la consulta nos devuelve un valor
		 	//mayor a cero
		 	if($respuesta->num_rows>0){
	                   //se obtiene el arreglo de la base de datos
		           	   $row= $respuesta->fetch_row();
		           	   //Recuperacion el Hash de la BD
		           	   $Hashing	= $row[1];
	                   	
	                   //Realizamos el comparación del paswrod con la instrucción if
		               if($Contrasena->CheckPassword($contra, $Hashing)){
		               	//Recuperamos el Id del usuario
		               	$idsur              =$row[0];
		               	//Recuperamos el nombre de usuario para imprimir
		               	$this->Nombre_usr    = $row[2];
		               	//Recuperando la hora en el que ingreso
		               	$hora                = time();
		               	//Recuperamos los datos para incriptar
		                $Clave = $Contrasena->HashPassword($idsur.$IpUsr.$this->Nombre_usr.$hora); 
	                    //Registrando a la varaible global datos en un arreglo para iniciar session
		                  $_SESSION['INGRESO'] = array(
		                  	"Id"    =>$idsur,
		                  	"Nombre"=>$this->Nombre_usr,
		                  	"Clave" =>$Clave,
		                  	"hora"  =>$hora); 

		                  //Asignamos el valor verdadero para retornarlo
		                  $retornar           = true;
		               }else {
		               	  $this->Mensaje ='<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong> Error!</strong> Contraseña incorrecto escriba nuevamente. </div>';
		                  $retornar      =false; //El paswor ingresado no es correcto
		               }
		           		
		           }
		}
	 return $retornar; //Retornamos el valor true o false
	}
	/**
	 * Retorna el IP de usuario
	 * @return [string] [devuel la io del usuario]
	*/
	
	/**
	 * Devuelve el mensaje generado
	 * para mostrar al usuario
	 */
	public function MostrarMsg(){
		return $this->Mensaje;
	}
}
 ?>