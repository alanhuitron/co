<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b> DETALLE DE LAS ESTRATEGIAS POR VARIABLE</b></h3>
	</div>

	<div class="modal-body">
		

		
		<div class="portlet-body">

				<div class="table-scrollable">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:3%;">ID</th>
								<th style="width:80%;">Nombre Estrategia</th>
								 
								 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaEstMed">
								<td>{{arr.idestrategia}}</td>
								<td>{{arr.nomestra}}</td>
								
							</tr>

						</tbody>


						<tbody ng-if="arrListaEstMed.length == 0">
							<tr>
								<td colspan="2">SIN REGISTROS</td>
							</tr>
						</tbody>
					</table>
				</div>


		</div>


		 

	</div>

	<div class="modal-footer">
		 
		<button ng-click="cancelMed()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 