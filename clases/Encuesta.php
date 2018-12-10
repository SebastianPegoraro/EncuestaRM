<?php
require_once 'Connect.php';

class Encuesta{
    private $id;
    private $titulo;
    private $fechaInicio;
    private $fechaCierre;
    const TABLA = 'encuestas';

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
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
	
	//busca todos los Tramites existentes
    public function showEncuestas(){
        $conexion = new Connect();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA.' WHERE id GROUP BY id DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    

}