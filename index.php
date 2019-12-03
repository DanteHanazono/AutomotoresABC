<?php
session_start();
require_once "libs/conexion.php";
require_once "libs/rutas.php";
require_once "libs/vista.php";
date_default_timezone_set("America/bogota");
if (isset($_GET['controlador']) && isset($_GET['accion'])) {
	$nombreControlador = $_GET['controlador'];
	$nombreAccion      = $_GET['accion'];
} else {
	$nombreControlador = "inicio";
	$nombreAccion      = "index";
}
rutas::cargarContenido($nombreControlador, $nombreAccion);