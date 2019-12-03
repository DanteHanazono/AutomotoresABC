<?php
class usuario_modelo{

	public function __construct(){}

	public function mdlRegUsuario($datos){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = array("usu_nombre" => $datos["nombres"],
			"usu_nick"    => $datos["nick"],
			"usu_foto"	   => $datos["foto"],
			"usu_correo"  => $datos["correo"],
			"usu_pass"    => sha1($datos["password"]),
			"usu_fch_nac" => $datos["fecha"],
			"usu_estado"  => 1,
			"usu_rol"     => 2,
            "usu_fch_rgt" => date("Y_m_d H_i_s"),
			    "usu_doc" => $datos["documentoid"]);
		$rta = $bd->insertar($c, "t_usuario", $sql);
		return $rta;
	}

	public function mdlValidarNick($nick){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_usuario WHERE usu_nick = :usu_nick";
		$s = $c->prepare($sql);
		$s->execute(array("usu_nick" => $nick));
		return $s->rowCount();
	}

	public function mdlValidarUsuario($nick, $password){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_usuario WHERE usu_nick = :usu_nick AND usu_pass = :usu_pass";
		$s = $c->prepare($sql);
		$s->execute(array("usu_nick" => $nick, "usu_pass" => sha1($password)));
		if ($s->rowCount() > 0){
			return $s->fetch();
		}else{
			return array(); 
		}
	}	

	public static function mdlListarUsuarios(){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_usuario";
		$s = $c->prepare($sql);
		$s->execute();
		return $s->fetchAll();
	}

	public static function mdlEliminar($id){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "DELETE FROM t_usuario WHERE usu_id = :id AND usu_rol != 1";
		$s = $c->prepare($sql);
		return $s->execute(array("id" => $id));
	}
	public static function mdlConsultarUsuXID($id){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_usuario WHERE usu_ID = :id";
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
		$sql = array("usu_estado"  => $datos["estado"],
						"usu_rol"  => $datos["rol"]);

		$rta = $bd->actualizar($c, "t_usuario", $sql, "WHERE usu_id = ".$datos["id"]);
		return $rta;
	}
	public static function mdlEditarPerfil($datos){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = array("usu_nombre"  => $datos["nombre"],
						"usu_fch_nac"  => $datos["nacimiento"],
							"usu_correo"  => $datos["correo"]);

		$rta = $bd->actualizar($c, "t_usuario", $sql, "WHERE usu_id = ".$datos["id"]);
		return $rta;
	}
	public static function mdlBUsuario($dato){
		$bd = new conexion();
		$c = $bd->conectarse();
		$sql = "SELECT * FROM t_usuario WHERE usu_nick LIKE '".$dato."%'";
		$s = $c->prepare($sql);
		$s->execute(array("nick" => $dato));
		
			return $s->fetchAll();
	}
}
