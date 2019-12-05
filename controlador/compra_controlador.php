<?php
require_once "modelo/compra_modelo.php";
class compra_controlador{
    public function __construct(){
		$this->vista = new vista();
    }
    public function index(){
		extract($_REQUEST);
		$this->vista->vehiculo = compra_modelo::mdlConsultarVehXID($id);
		$this->vista->datos = compra_modelo::mdlListarCompras($id);
		$this->vista->mostrarPagina("compra/index");
	}
}