<?php
class inicio_modelo{

	public function __construct(){}

	public static function mdlListarVehiculos(){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_vehiculo";
		$s = $c->prepare($sql);
		$s->execute();
		return $s->fetchAll();
	}	
}