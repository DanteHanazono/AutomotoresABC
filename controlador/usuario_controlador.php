<?php
require_once "modelo/usuario_modelo.php";
class usuario_controlador{

	public function __construct(){
		$this->vista = new vista();
	} 

	public function index(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		$this->vista->datos = usuario_modelo::mdlListarUsuarios();
		$this->vista->mostrarPagina("usuario/index");
	}

	public function frmLogin(){
		$this->vista->mostrarPagina("usuario/login");
	}

	public function frmRegistro(){
		$this->vista->mostrarPagina("usuario/registro");
	}
	public function frmPerfil(){
		$this->vista->datos = usuario_modelo::mdlConsultarUsuXID($_SESSION["usu_id"]);
		$this->vista->mostrarPagina("usuario/perfil");
	}

	public function crearUsuario(){
		extract($_REQUEST);
		if (!isset($_REQUEST["aceptar"])) {
			header("Location: /AutomotoresABC");
			exit;
		}
		$rta = usuario_modelo::mdlValidarNick($nick);
		if ($rta > 0) {
			$this->vista->mensaje = "Este nick esta registrado";
		}else{	
			$datos["nombres"]  		= $nombres;
			$datos["apellido"]		= $apellido;
			$datos["nick"]     		= $nick;
			$datos["password"] 		= $password;
			$datos["correo"]   		= $correo;
			$datos["documentoid"] 	= $documentoid;
			$datos["tipo"] 			= $tipo;
			$datos["celular"] 		= $celular;
			$rta = usuario_modelo::mdlRegUsuario($datos);
			if ($rta > 0) {
				$this->vista->mensaje = "Cliente registrado";
			}else{
				$this->vista->mensaje = "Error al registrar";
			}
		}
		$this->vista->mostrarPagina("usuario/registro");
	}

	public function validarUsuario(){
		extract($_REQUEST);
		$rta = usuario_modelo::mdlValidarUsuario($nick, $password);
		if (count($rta) > 0) {
			$_SESSION["usu_id"] = $rta["usu_id"];
			$_SESSION["usu_nombre"] = $rta["usu_nombre"];
			$_SESSION["usu_apellido"] = $rta["usu_apellido"];
			$_SESSION["usu_rol"] = $rta["usu_rol"];
			$_SESSION["usu_nick"] = $rta["usu_nick"];
			$_SESSION["usu_correo"] = $rta["usu_correo"];
			$_SESSION["usu_doc"] = $rta["usu_doc"];
			$_SESSION["usu_tipo"] = $rta["usu_tipo"];
			$_SESSION["usu_cel"] = $rta["usu_cel"];
			//header("Location: /FORO");
			$this->vista->mensaje = "Bienvenido";
			$estado = "success";
			if ($_SERVER["HTTP_HOST"] == "localhost") {
				$url = "http://localhost/AutomotoresABC/";
			}else{
				$url = "https://foro.sit.moe/";
			}
			$icono = "";
		}else{
			$this->vista->mensaje = "Verifique usuario o contraseña";
			$estado = "danger";
			$icono = "ti-na";
			$url = "";
		}
		echo json_encode(array("mensaje" => $this->vista->mensaje,
			"estado" => $estado,
			"icono" => $icono,
		    "url" => $url));
	}

	public function cerrar(){
		session_destroy();
		header("Location: /AutomotoresABC");
	}

	public function eliminar(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		extract($_REQUEST);
		$rta = usuario_modelo::mdlEliminar($id);
		header("Location:?controlador=usuario&accion=index");
	}
	
	public function frmEditar(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		extract($_REQUEST);
		$this->vista->datos = usuario_modelo::mdlConsultarUsuXID($id);
		$this->vista->mostrarPagina("usuario/editar");
	}
	public function editarUsuario(){
		if (!isset($_REQUEST["aceptar"])) {
			header("Location: /AutomotoresABC");
		}else{
			extract($_REQUEST);
			$datos["estado"] = $estado;
			$datos["rol"] = $rol;
			$datos["id"] = $id;
			$r = usuario_modelo::mdlEditar($datos);
			header("Location: ?controlador=usuario&accion=index");
		}
	}
	public function frmEditarPerfil(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		extract($_REQUEST);
		$this->vista->datos = usuario_modelo::
		mdlEditarPerfil($id);
		$this->vista->mostrarPagina("usuario/perfil");
	}
	public function editarPerfil(){
		//if (!isset($_REQUEST["aceptar"])) {
		//	header("Location: /FORO");
		//}else{
			extract($_REQUEST);
			$datos["nombre"] = $nombre;
			$datos["apellido"] = $apellido;
			$datos["correo"] = $correo;
			$datos["celular"] = $celular;
			$datos["id"] = $_SESSION["usu_id"];
			$r = usuario_modelo::mdlEditarPerfil($datos);
		//}
		if ($r > 0) {
			$this->vista->mensaje = "Perfil editado exitosamente";
			$estado = "success";
			$icono = "ti-thumb-up";
		}else{	
			$this->vista->mensaje = "Error al editar perfil";
			$estado = "danger";
			$icono = "ti-close";
		}
		echo json_encode(array("mensaje" => $this->vista->mensaje,
			"estado" => $estado,
			"icono" => $icono));
	}
	public function frmBuscar(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		$this->vista->mostrarPagina("usuario/frmBuscar");
	}
	//la busqueda se realiza por el nick
	public function busquedaUsuario(){
		extract($_REQUEST);
		$r = usuario_modelo::mdlBUsuario($dato);
		$tabla = "";
		$tabla .= "<table class='table table-bordered'>";
		$tabla .= "<tr>";
		$tabla .= "<th>NOMBRE USUARIO</th>";
		$tabla .= "<th>NICK</th>";
		$tabla .= "<th>CORREO</th>";
		$tabla .= "<th>TIPO DOCUMENTO</th>";
		$tabla .= "<th>NUMERO DE DOCUMENTO</th>";
		$tabla .= "<th>NUMERO DE CELULAR</th>";
		$tabla .= "<th>ESTADO</th>";
		$tabla .= "<th>ROL</th>";
		$tabla .= "<th></th>";
		$tabla .= "<th></th>";
		$tabla .= "</tr>";
		foreach ($r as $valor) {
			$estado = ($valor["usu_estado"]==1)?"Activo":"Inactivo";
			$rol = ($valor["usu_rol"]==1)?"Administrador":"Cliente";
			$tabla .= "<tr>";
			$tabla .= "<td>".$valor["usu_nombre"]."</td>";
			$tabla .= "<td>".$valor["usu_nick"]."</td>";
			$tabla .= "<td>".$valor["usu_correo"]."</td>";
			$tabla .= "<td>".$valor["usu_tipo"]."</td>";
			$tabla .= "<td>".$valor["usu_doc"]."</td>";
			$tabla .= "<td>".$valor["usu_cel"]."</td>";
			$tabla .= "<td>".$estado."</td>";
			$tabla .= "<td>".$rol."</td>";
			$tabla .= "<td><a href='?controlador=usuario&accion=frmEditar&id=".$valor['usu_id']."'>Editar</a></td>";
			$opcion = "";
			if($valor["USU_ROL"] != 1) {
				$opcion = "<a href='?controlador=usuario&accion=eliminar&id=".$valor['usu_id']."' onclick='return confirm(\"¿Está seguro que desea eliminar?\")'>Eliminar</a>";
			}
			$tabla .= "<td>$opcion</td>";
			$tabla .= "</tr>";	
		}
		$tabla .= "</table>";
		echo json_encode(array("texto"=>$tabla));
	}
}