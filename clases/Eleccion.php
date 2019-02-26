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

	public function buscarPorId($id){
        $conexion = new Connect();
        $consulta = $conexion->prepare('SELECT descripcion FROM '.self::TABLA.' WHERE id = :id');
		$consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if ($registro) {
            return new self($registro['descripcion'], $id);
        } else {
            return false;
        }
	}

	public function buscarPorDescripcion($descripcion, $idOpcion){
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT elecciones.id FROM elecciones INNER JOIN opciones ON elecciones.id = opciones.eleccion_id WHERE elecciones.descripcion = :descripcion AND opciones.id = :idOpcion');
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':idOpcion', $idOpcion);
		$consulta->execute();
		$registro = $consulta->fetch();
		return $registro[0];
	}

	public function buscarIdParaText($idPregunta, $idTipo){
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT elecciones.* FROM elecciones INNER JOIN opciones ON elecciones.id = opciones.eleccion_id WHERE opciones.tipo_id = :idTipo AND opciones.pregunta_id = :idPregunta');
		$consulta->bindParam(':idPregunta', $idPregunta);
		$consulta->bindParam(':idTipo', $idTipo);
		$consulta->execute();
		$registro = $consulta->fetch();
		if ($registro) {
            return new self($registro['descripcion'], $registro['id']);
        } else {
            return false;
        }
	}
    
}
