<?php
require_once 'Connect.php';

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

	public function __construct($descripcion, $id=null){
		$this->descripcion = $descripcion;
		$this->id = $id;
	}
	
	public function guardarEleccion(){
		$conexion = new Connect();
		if($this->id){
			$consulta = $conexion->prepare('UPDATE '.self::TABLA.' SET descripcion = :descripcion WHERE id = :id');
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':id', $this->id);
			$consulta->execute();
		} else {
			$consulta = $conexion->prepare('INSERT INTO '.self::TABLA.' (descripcion) VALUES (:descripcion)');
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}
    
}
