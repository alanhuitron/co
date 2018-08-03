<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b>DETALLE DE LAS MEDIDAS CORRECTIVAS A EMPLEAR</b></h3>
	</div>

	<div class="modal-body">
		

		
		<div class="portlet-body">

				<div class="table-scrollable">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:3%;">ID</th>
								<th style="width:50%;">Nombre Medida</th>
								<th style="width:20%;">Opciones</th>
								 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaMedidas">
								<td>{{arr.idmedida}}</td>
								<td>{{arr.nommed}}</td>
								 <td> <button type="button" ng-click="deleteMed(arr.idmedida)" class="btn red input-sm" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></button></td>
							</tr>

							 
						</tbody>
					</table>
				</div>


		</div>


		<form name="Form">
			
			<div class="row">


			<br>
				<div class="form-group col-md-12 col-sm-12">
					<label style="color:darkblue;"> Ingresar Nueva Medida Correctiva</label>	
					<textarea class="form-control input-sm" ng-model="fMed.nombre">
					</textarea>
				</div>

 

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarMed()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelMed()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 