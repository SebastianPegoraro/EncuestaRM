<?php

class Opcion{
    private $id;
    private $eleccion;
    private $tipo;
    private $estado;
    private $pregunta;
    const TABLA = 'opciones';
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEleccion(){
		return $this->eleccion;
	}

	public function setEleccion($eleccion){
		$this->eleccion = $eleccion;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getPregunta(){
		return $this->pregunta;
	}

	public function setPregunta($pregunta){
		$this->pregunta = $pregunta;
    }
    
    
}