<?php
class vehiculo_modelo{

	public function __construct(){}

	public static function mdlCrearVehiculo($datos){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = array("veh_marca"  	=> $datos["marca"],
					"veh_modelo"	=> $datos["modelo"],
					"veh_precio"	=> $datos["precio"],
					"veh_chasis"	=> $datos["chasis"]);
		$rta = $bd->insertar($c, "t_vehiculo", $sql);
		return $rta;
	}

	public function mdlValidarChasis($chasis){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_vehiculo WHERE veh_chasis = :veh_chasis";
		$s = $c->prepare($sql);
		$s->execute(array("veh_chasis" => $chasis));
		return $s->rowCount();
	}

	public static function mdlListarVehiculos(){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_vehiculo";
		$s = $c->prepare($sql);
		$s->execute();
		return $s->fetchAll();
	}

	public static function mdlEliminar($id){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "DELETE FROM t_vehiculo WHERE veh_id = :id";
		$s = $c->prepare($sql);
		return $s->execute(array("id" => $id));
	}

	public static function mdlConsultarVehXID($id){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_vehiculo WHERE veh_id = :id";
		$s = $c->prepare($sql);
		$s->execute(array("id" => $id));
		if($s->rowCount() > 0){
			return $s->fetch();
		} else {
			return array();
		}
	}
	
	public static function mdlEditar($datos){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = array("veh_marca"  	=> $datos["marca"], 
					"veh_modelo"	=> $datos["modelo"],
					"veh_precio"	=> $datos["precio"],
					"veh_chasis"	=> $datos["chasis"]);
		$rta = $bd->actualizar($c, "t_vehiculo", $sql, "WHERE veh_id = ".$datos["id"]);
		return $rta;
	}
}