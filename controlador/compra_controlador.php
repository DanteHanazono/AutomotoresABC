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
		$this->vista->mostrarPagina("comprar/cmpra");
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