<?php
require_once "modelo/compra_modelo.php";
class compra_controlador{
    public function __construct(){
		$this->vista = new vista();
    }
    public function index(){
		extract($_REQUEST);
		$this->vista->datos = compra_modelo::mdlListarCompras();
		$this->vista->mostrarPagina("comprar/index");
    }
    public function frmComprar(){
		$this->vista->mostrarPagina("comprar/compra");
	}
	public function crearCompra(){
		extract($_REQUEST);
		$datos["documentoid"] = $documentoid;
		$datos["chasis"] = $chasis;
		
		$Vector1 = compra_modelo::mdlBuscarUsuarioXCC($documentoid);
    	$datos["usu_id"] = $Vector1["usu_id"];
		$Vector2 = compra_modelo::mdlConsultarVehXChasis($chasis);
		$datos["veh_id"] = $Vector2["veh_id"];

		$rta = compra_modelo::mdlComprar($datos);
		if ($rta > 0) {
			$this->vista->mensaje = "Compra realizada";
			$estado = "success";
			$icono = "ti-thumb-up";
		}else{	
			$this->vista->mensaje = "Error al comprar";
			$estado = "danger";
			$icono = "ti-close";
		}
		echo json_encode(array("mensaje" => $this->vista->mensaje,
			"estado" => $estado,
			"icono" => $icono));
	}
    public function eliminar(){
		if(isset($_SESSION["usu_id"])){
			extract($_REQUEST);
			$rta = compra_modelo::mdlEliminar($id);
			header("Location:?controlador=compra&accion=index&id=".$veh_id);
		}else{
			header("Location: /");
		}
	}
}