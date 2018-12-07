<?php

class Pregunta{
    private $id;
    private $descripcion;
    private $encuesta;
    const TABLA = 'preguntas';
    
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

	public function getEncuesta(){
		return $this->encuesta;
	}

	public function setEncuesta($encuesta){
		$this->encuesta = $encuesta;
    }
    
    
}