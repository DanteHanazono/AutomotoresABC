<div class="card">
	<h5 class="card-header bg-dark text-white">Administración de Vehiculos</h5>
	<div class="card-body">
		<h5 class="card-title">Categoría</h5>
		<a class="btn btn-dark" href="?controlador=vehiculo&accion=frmCrear">Añadir Vehiculo</a>
		<?php
		echo "<table class='table table-bordered'>";
		echo "<tr>";
		echo "<th>Marca</th>";
		echo "<th>Modelo</th>";
		echo "<th>Precio</th>";
		echo "</tr>";
		foreach ($this->datos as $valor) {
		echo "<tr>";
        echo "<td>".$valor["veh_marca"]."</td>";
        echo "<td>".$valor["veh_modelo"]."</td>";
        echo "<td>".$valor["veh_precio"]."</td>";
		echo "<td><a href='?controlador=vehiculo&accion=frmEditar&id=".$valor['veh_id']."'>Editar</a></td>";
		echo "<td><a href='?controlador=vehiculo&accion=eliminar&id=".$valor['veh_id']."' onclick='return confirm(\"¿Está seguro que desea eliminar?\")'>Eliminar</a></td>";
		echo "</tr>";	
		}
		echo "</table>";
		?>
		</div>
</div>