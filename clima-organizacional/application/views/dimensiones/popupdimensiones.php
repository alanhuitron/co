<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b>Registro</b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">
				<div class="form-group col-md-12 col-sm-12">
					<label>Nombre</label>	
					<input type="text" class="form-control input-sm" ng-model="fDim.nombre">
				</div>

				<div class="form-group col-md-12 col-sm-12">
					<label>Descripción</label>	
					<textarea type="text" class="form-control input-sm" ng-model="fDim.descripcion"></textarea>
				</div>
 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarDim()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelDim()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 