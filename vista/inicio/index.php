<div class="card">
	<h5 class="card-header bg-dark text-white">Inicio</h5>
	<div class="card-body">
		<h5 class="card-title"><p class="card-text">

			<?php
			if (isset($_SESSION["USU_ID"])) {
				echo "Hola ".$_SESSION["USU_NICK"]."<br />";
			}
			?>
		</h5>
		<p>Vehiculos disponibles</p>
		<?php
		echo "<table class='table table-bordered'>";
		echo "<tr>";
        echo "<th>MARCA</th>";
        echo "<th>MODELO</th>";
        echo "<th>PRECIO</th>";
		echo "</tr>";
		foreach ($this->datos as $valor) {
		echo "<tr>";
        echo "<td>".$valor["veh_marca"]."</td>";
        echo "<td>".$valor["veh_modelo"]."</td>";
		echo "<td>".$valor["veh_precio"]."</td>";
		echo "</tr>";	
		}
		echo "</table>";
		?>
	</div>
</div>