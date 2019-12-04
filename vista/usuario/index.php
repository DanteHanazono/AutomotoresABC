<div class="card">
	<h5 class="card-header bg-dark text-white">Usuario</h5>
	<div class="card-body">
		<h5 class="card-title">Información del usuario</h5>
		<p class="card-text">Aquí se crea o edita la información del usuario</p>

		<?php
		echo "<table class='table table-bordered'>";
		echo "<tr>";
		echo "<th>NOMBRE</th>";
		echo "<th>APELLIDO</th>";
		echo "<th>TIPO DE DOCUMENTO</th>";
		echo "<th>NUMERO DE DOCUMENTO</th>";
		echo "<th></th>";
		echo "<th></th>";
		echo "</tr>";
		foreach ($this->datos as $valor) {
			$estado = ($valor["usu_estado"]==1)?"Activo":"Inactivo";
			$rol = ($valor["usu_rol"]==1)?"Administrador":"Publicador";
			echo "<tr>";
			echo "<td>".$valor["usu_nombre"]."</td>";
			echo "<td>".$valor["usu_apellido"]."</td>";
			echo "<td>".$valor["usu_tipo"]."</td>";
			echo "<td>".$valor["usu_doc"]."</td>";

			echo "<td><a href='?controlador=usuario&accion=frmEditar&id=".$valor['usu_id']."'>Editar</a></td>";
			$opcion = "";
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