<?php
class  vista{
	public function  __construct(){}
	public function mostrarpagina($contenido, $estructuracompleta = true){
		if ($estructuracompleta == true){
			require_once "vista/header.php";
			require_once "vista/".$contenido.".php";
			require_once "vista/footer.php";
		}else{
			require_once "vista/".$contenido.".php";
		}
	}
}