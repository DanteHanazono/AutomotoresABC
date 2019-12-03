<?php
class rutas{ 
	public function cargarContenido($nombreControlador, $nombreAccion){
		$nombreArchivo= $nombreControlador."_controlador";
		if (file_exists("controlador/".$nombreArchivo.".php")){
			require_once "controlador/".$nombreArchivo.".php";
			$obj= new $nombreArchivo();
			if (method_exists($obj, $nombreAccion)){
			$obj->$nombreAccion();
		}else{ echo "funcion/metodo/accion no definida";
	}
		}else{
			header("location: /foro");
		}
	}
}