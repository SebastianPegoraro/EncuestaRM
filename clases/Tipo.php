<?php
require_once 'Connect.php';

class Tipo{
    private $id;
    private $clase;
    const TABLA = 'tipos';

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getClase(){
		return $this->clase;
	}

	public function setClase($clase){
		$this->clase = $clase;
    }
    
    public function __construct($clase, $id=null){
		$this->clase = $clase;
		$this->id = $id;
	}

	public function guardarTipo(){
		$conexion = new Connect();
		if($this->id){
			$consulta = $conexion->prepare('UPDATE '.self::TABLA.' SET clase = :clase WHERE id = :id');
			$consulta->bindParam(':clase', $this->clase);
			$consulta->bindParam(':id', $this->id);
			$consulta->execute();
		} else {
			$consulta = $conexion->prepare('INSERT INTO '.self::TABLA.' (clase) VALUES (:clase)');
			$consulta->bindParam(':clase', $this->clase);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	public function showTipo(){
        $conexion = new Connect();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA.' GROUP BY id DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
	}
	
	public function buscarId($clase){
        $conexion = new Connect();
		$consulta = $conexion->prepare('SELECT id FROM '.self::TABLA.' WHERE clase = :clase');
		$consulta->bindParam(':clase', $clase);
        $consulta->execute();
        $registros = $consulta->fetch();
        return $registros;
	}
	
	public function buscarPorId($id){
        $conexion = new Connect();
        $consulta = $conexion->prepare('SELECT clase FROM '.self::TABLA.' WHERE id = :id');
		$consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if ($registro) {
            return new self($registro['clase'], $id);
        } else {
            return false;
        }
	}
}