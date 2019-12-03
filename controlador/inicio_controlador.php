<?php
require_once "modelo/inicio_modelo.php";
class inicio_controlador{

	public function __construct(){
		$this->vista = new vista();
	} 

	public function index(){
		$this->vista->datos = inicio_modelo::mdlListarVehiculos();
		$this->vista->mostrarPagina("inicio/index");
	}
}