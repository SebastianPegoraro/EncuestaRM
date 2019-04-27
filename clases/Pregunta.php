<?php
require_once 'Connect.php';

class Pregunta{
    private $id;
    private $descripcion;
    private $encuestaId;
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

	public function getEncuestaId(){
		return $this->encuestaId;
	}

	public function setEncuestaId($encuestaId){
		$this->encuestaId = $encuestaId;
	}
	
	public function __construct($descripcion, $encuestaId, $id=null) {
        $this->descripcion = $descripcion;
        $this->encuestaId = $encuestaId;
        $this->id = $id;
    }
    
    public function guardarPregunta(){
		$conexion = new Connect();
		if($this->id){
			$consulta = $conexion->prepare('UPDATE '.self::TABLA.' SET descripcion = :descripcion, encuesta_id = :encuestaId WHERE id = :id');
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':encuestaId', $this->encuestaId);
			$consulta->bindParam(':id', $this->id);
			$consulta->execute();
		} else {
			$consulta = $conexion->prepare('INSERT INTO '.self::TABLA.' (descripcion, encuesta_id) VALUES (:descripcion, :encuestaId)');
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':encuestaId', $this->encuestaId);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function cantPreguntasPorEncuesta($encuesta){
		$total = 0;
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT COUNT(*) FROM '.self::TABLA.' WHERE encuesta_id = :encuesta');
		$consulta->bindParam(':encuesta', $encuesta);
		$consulta->execute();
		$total = $consulta->fetch();
		return $total;
	}

	public function preguntasPorEncuesta($encuesta){
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT id, descripcion FROM '.self::TABLA.' WHERE encuesta_id = :encuesta');
		$consulta->bindParam(':encuesta', $encuesta);
		$consulta->execute();
		$registro = $consulta->fetchAll();
        return $registro;
	}

	public function eliminar($encuestaId)
	{
		$conexion = new Connect();
        $consulta = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE encuesta_id = :encuestaId');
		$consulta->bindParam(':encuestaId', $encuestaId);
        $consulta->execute();
	}

	public function eliminarPregunta($id)
	{
		$conexion = new Connect();
        $consulta = $conexion->prepare('DELETE FROM '.self::TABLA.' WHERE id = :id');
		$consulta->bindParam(':id', $id);
        $consulta->execute();
	}
}