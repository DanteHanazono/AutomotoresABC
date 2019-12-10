<div class="card">
	<h5 class="card-header bg-dark text-white">Comprar vehiculo</h5>
	<div class="card-body">
		<a class="btn btn-dark" href="?controlador=compra&accion=frmComprar">Comprar</a>
		<?php
		echo "<table class='table table-bordered'>";
		echo "<tr>";
		echo "<th>NOMBRE</th>";
		echo "<th>APELLIDO</th>";
		echo "<th>TIPO DE DOCUMENTO</th>";
		echo "<th>NUMERO DE DOCUMENTO</th>";
		echo "<th>NUMERO DE CHASIS</th>";
		echo "<th></th>";
		echo "</tr>";
		foreach ($this->datos as $valor) {
			echo "<tr>";
			echo "<td>".$valor["usu_nombre"]."</td>";
			echo "<td>".$valor["usu_apellido"]."</td>";
			echo "<td>".$valor["usu_tipo"]."</td>";
			echo "<td>".$valor["usu_doc"]."</td>";
			echo "<td>".$valor["veh_chasis"]."</td>";
			if($valor["usu_rol"] != 1) {
				$opcion = "<a href='?controlador=usuario&accion=eliminar&id=".$valor['usu_id']."' onclick='return confirm(\"¿Está seguro que desea eliminar?\")'>Eliminar</a>";
			}
			echo "<td>$opcion</td>";
			echo "</tr>";	
		}
		echo "</table>";
		?>

	</div>
</div>