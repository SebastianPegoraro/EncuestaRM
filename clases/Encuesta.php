<?php
require_once 'Connect.php';

class Encuesta{
    private $id;
    private $titulo;
    private $fechaInicio;
	private $fechaCierre;
	private $fechaCreacion;
    const TABLA = 'encuestas';

    public function getId(){
		return $this->id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getFechaInicio(){
		return $this->fechaInicio;
	}

	public function setFechaInicio($fechaInicio){
		$this->fechaInicio = $fechaInicio;
	}

	public function getFechaCierre(){
		return $this->fechaCierre;
	}

	public function setFechaCierre($fechaCierre){
		$this->fechaCierre = $fechaCierre;
	}

	public function getFechaCreacion(){
		return $this->fechaCreacion;
	}

	public function setFechaCreacion($fechaCreacion){
		$this->fechaCreacion = $fechaCreacion;
	}

	public function __construct($titulo, $fechaInicio, $fechaCierre, $fechaCreacion, $id=null){
		$this->titulo = $titulo;
		$this->fechaInicio = $fechaInicio;
		$this->fechaCierre = $fechaCierre;
		$this->fechaCreacion = $fechaCreacion;
		$this->id = $id;
	}
	
	//busca todos los Tramites existentes
    public function showEncuestas(){
        $conexion = new Connect();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA.' WHERE id GROUP BY id DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
	}
	
	public function guardarEncuesta(){
		$conexion = new Connect();
		if($this->id){
			$consulta = $conexion->prepare('UPDATE '.self::TABLA.' SET titulo = :titulo, fecha_inicio = :fechaInicio, fecha_cierre = :fechaCierre, fecha_creacion = :fechaCreacion WHERE id = :id');
			$consulta->bindParam(':titulo', $this->titulo);
			$consulta->bindParam(':fechaInicio', $this->fechaInicio);
			$consulta->bindParam(':fechaCierre', $this->fechaCierre);
			$consulta->bindParam(':fechaCreacion', $this->fechaCreacion);
			$consulta->bindParam(':id', $this->id);
			$consulta->execute();
		} else {
			$consulta = $conexion->prepare('INSERT INTO '.self::TABLA.' (titulo, fecha_inicio, fecha_cierre, fecha_creacion) VALUES (:titulo, :fechaInicio, :fechaCierre, :fechaCreacion)');
			$consulta->bindParam(':titulo', $this->titulo);
			$consulta->bindParam(':fechaInicio', $this->fechaInicio);
			$consulta->bindParam(':fechaCierre', $this->fechaCierre);
			$consulta->bindParam(':fechaCreacion', $this->fechaCreacion);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}

}