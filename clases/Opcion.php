<?php
require_once 'Connect.php';

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
	
	public function __construct($eleccion, $tipo, $pregunta, $estado=null, $id=null){
		$this->eleccion = $eleccion;
		$this->tipo = $tipo;
		$this->pregunta = $pregunta;
		$this->estado = $estado;
		$this->id = $id;
	}

	public function guardarOpcion(){
		$conexion = new Connect();
		if($this->id){
			$consulta = $conexion->prepare('UPDATE '.self::TABLA.' SET eleccion_id = :eleccion, tipo_id = :tipo, pregunta_id = :pregunta, estado = :estado WHERE id = :id');
			$consulta->bindParam(':eleccion', $this->eleccion);
			$consulta->bindParam(':tipo', $this->tipo);
			$consulta->bindParam(':pregunta', $this->pregunta);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->bindParam(':id', $this->id);
			$consulta->execute();
		} else {
			$consulta = $conexion->prepare('INSERT INTO '.self::TABLA.' (eleccion_id, tipo_id, pregunta_id, estado) VALUES (:eleccion, :tipo, :pregunta, :estado)');
			$consulta->bindParam(':eleccion', $this->eleccion);
			$consulta->bindParam(':tipo', $this->tipo);
			$consulta->bindParam(':pregunta', $this->pregunta);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}
	
	public function opcionesPorPregunta($idPregunta){
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT id, eleccion_id, tipo_id, estado FROM '.self::TABLA.' WHERE pregunta_id = :idPregunta AND estado IS NULL');
		$consulta->bindParam(':idPregunta', $idPregunta);
		$consulta->execute();
		$registro = $consulta->fetchAll();
        return $registro;
	}

	public function cantOpcionesCheckbox($pregunta, $tipo){
		$total = 0;
		$conexion = new Connect();
		$consulta = $conexion->prepare('SELECT COUNT(*) FROM '.self::TABLA.' WHERE pregunta_id = :preguntaId AND tipo_id = :tipoId');
		$consulta->bindParam(':preguntaId', $pregunta);
		$consulta->bindParam(':tipoId', $tipo);
		$consulta->execute();
		$total = $consulta->fetch();
		return $total;
	}
    
}