<?php
class compra_modelo{
    public function __construct(){}

    public function mdlComprar($datos){
        $bd = new conexion();
        $c = $bd->conectarse();
        $sql = array(
		    "compra_usu_id"  => $datos["usu_id"],
		    "compra_veh_id"  => $datos["veh_id"],
		    "compra_rgt" => date("Y-m-d H:i:s"));
		$rta = $bd->insertar($c, "t_compra", $sql);
		return $rta;
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
    public static function mdlListarCompras(){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_compra 
        inner join t_usuario on usu_id = compra_usu_id
        inner join t_vehiculo on veh_id = compra_veh_id
		ORDER BY compra_id DESC";
		$s = $c->prepare($sql);
		$s->execute();
		return $s->fetchAll();
    }
    public static function mdlEliminar($id){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "DELETE FROM t_compra WHERE compra_id = :id";
		$s = $c->prepare($sql);
		return $s->execute(array("id" => $id));
    }
}