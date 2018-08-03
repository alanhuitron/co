<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b> Comentanos alguna sugerencia </b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">

				<div class="form-group col-md-12 col-sm-12">
					<label>Nombre </label>	
					<input type="text" class="form-control input-sm" ng-model="fSug.nombre">
				</div>

				<div class="form-group col-md-12 col-sm-12">
					<label>Descripción</label>	
					<input type="text" class="form-control input-sm" ng-model="fSug.descripcion">
				</div>

				
 
				 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarCue()" class="btn btn-success" >Registrar</button>
		<button ng-click="cancelVar()" class="btn btn-warning">Cerrar</button>
	</div>


	
</div> 