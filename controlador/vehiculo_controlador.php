<?php
require_once "modelo/vehiculo_modelo.php";
class vehiculo_controlador{
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
		$this->vista->datos = vehiculo_modelo::mdlListarVehiculos();
		$this->vista->mostrarPagina("vehiculo/index");
	}
	public function frmCrear(){
		if(isset($_SESSION["usu_id"])){
			if($_SESSION["usu_rol"] != 1){
				header("Location: /AutomotoresABC");
			}
		}else{
			header("Location: /AutomotoresABC");
		}
		$this->vista->mostrarPagina("vehiculo/crear");
	}
	public function crearVehiculo(){
		extract($_REQUEST);
        $datos["marca"] = $marca;
        $datos["modelo"] = $modelo;
        $datos["precio"] = $precio;
        $datos["chasis"] = $chasis;
		$rta = vehiculo_modelo::mdlCrearVehiculo($datos);
		if ($rta > 0) {
			$this->vista->mensaje = "Vehiculo creado";
			$estado = "success";
			$icono = "ti-thumb-up";
		}else{	
			$this->vista->mensaje = "Error al crear";
			$estado = "danger";
			$icono = "ti-close";
		}
		echo json_encode(array("mensaje" => $this->vista->mensaje,
			"estado" => $estado,
			"icono" => $icono));
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
		$rta = vehiculo_modelo::mdlEliminar($id);
		header("Location:?controlador=vehiculo&accion=index");
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
		$this->vista->datos = vehiculo_modelo::mdlConsultarVehXID($id);
		$this->vista->mostrarPagina("vehiculo/editar");
	}
	public function editarVehiculo(){
		extract($_REQUEST);
		$datos["marca"] = $marca;
		$datos["id"] = $id;
		$r = vehiculo_modelo::mdlEditar($datos);
		if ($r > 0) {
			$this->vista->mensaje = "Vehiculo editado exitosamente";
			$estado = "success";
			$icono = "ti-thumb-up";
		}else{	
			$this->vista->mensaje = "Error al editar vehiculo";
			$estado = "danger";
			$icono = "ti-close";
		}
		echo json_encode(array("mensaje" => $this->vista->mensaje,
			"estado" => $estado,
			"icono" => $icono));
	}
}