<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b> Registro </b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">

				<div class="form-group col-md-12 col-sm-12">
						<label> <b> Periodo:</b> </label> <?php echo $this->session->userdata('periodo'); ?>
						<!--<input type="text" class="form-control input-sm" ng-model="fCue.periodo">-->
				</div>

				<div class="form-group col-md-12 col-sm-12">
					<label>Descripción Cuestionario</label>	
					<input type="text" class="form-control input-sm" ng-model="fCueA.descripcion">
				</div>

				
 
				 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarCueA()" class="btn btn-success" >Registrar</button>
		<button ng-click="cancelCueA()" class="btn btn-warning">Cerrar</button>
	</div>


	
</div> 