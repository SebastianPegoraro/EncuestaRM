<?php

class Eleccion{
    private $id;
    private $descripcion;
    const TABLA = 'elecciones';
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
    }
    
}
