<?php

class Usuario{
    private $id;
    private $nombre;
		private $password;
		private $tipo;
    const TABLA = 'usuarios';

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
    }

    public function getTipo(){
    	return $this->tipo;
    }

    public function setTipo($tipo){
    	$this->tipo = $tipo;
    }


}
