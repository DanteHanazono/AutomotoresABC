<div class="card">
	<h5 class="card-header bg-dark text-white">Editar vehiculo</h5>
	<div class="card-body">
		<form method="post" action="?controlador=vehiculo&accion=editarVehiculo" id="frmECat">
			<div class="row">
				<div class="input-group input-group-sm mb-1 col-md-6">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Marca del vehiculo</span>
					</div>
					<input type="text" class="form-control" name="marca" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $this->datos["veh_marca"]; ?>">
                </div>
                <div class="input-group input-group-sm mb-1 col-md-6">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Modelo del vehiculo</span>
					</div>
					<input type="text" class="form-control" name="modelo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $this->datos["veh_modelo"]; ?>">
				</div>
            </div>
            <div class="row">
				<div class="input-group input-group-sm mb-1 col-md-6">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Precio del vehiculo</span>
					</div>
					<input type="number" class="form-control" name="precio" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $this->datos["veh_precio"]; ?>">
                </div>
                <div class="input-group input-group-sm mb-1 col-md-6">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Numero del chasis del vehiculo</span>
					</div>
					<input type="number" class="form-control" name="chasis" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $this->datos["veh_chasis"]; ?>">
				</div>
			</div>
			<input type="submit" name="aceptar" value="Editar" class="btn btn-dark">
            <input type="hidden" name="id" value="<?php echo $this->datos["veh_id"]; ?>">
			<br />
			<?php
			if (isset($this->mensaje)) {
				echo $this->mensaje;
			}
			?>
		</form>
	</div>
</div>