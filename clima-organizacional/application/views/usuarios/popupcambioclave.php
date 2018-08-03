<div class="modal-content"  >
	
	<div class="modal-header">
		<h3> <b>Cambiar Clave </b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">
				<div class="form-group col-md-6 col-sm-6">
					<label>Clave Actual:</label>	
					<input type="text" class="form-control input-sm" ng-model="fCam.nombres">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Clave Nueva: </label>	
					<input type="text" class="form-control input-sm" ng-model="fCam.apellidos">
				</div>
 	
 				<div class="form-group col-md-6 col-sm-6">
					<label>Confirmar Clave: </label>	
					<input type="text" class="form-control input-sm" ng-model="fCam.email">
				</div>

				 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarPass()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelPass()" class="btn btn-warning">Cerrar</button>
	</div>
</div>