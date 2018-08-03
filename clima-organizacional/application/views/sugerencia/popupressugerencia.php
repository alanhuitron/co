<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b>Registro Respuesta</b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">
				 
				<input type="hidden" class="form-control input-sm" ng-model="fRes.idsug"  >

				<div class="form-group col-md-12 col-sm-12">
					<label>Descripción</label>	
					<textarea type="text" class="form-control input-sm" ng-model="fRes.descripcion"></textarea>
				</div>
 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarRes()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelRes()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 