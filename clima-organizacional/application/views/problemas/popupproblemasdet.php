<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b>DETALLE DE VOTOS DE LA VARIABLE</b></h3>
	</div>

	<div class="modal-body">
		

		
		<div class="portlet-body">

				<div class="table-scrollable">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:5%;">ID</th>
								<th style="width:80%;">Criterio</th>
								<th style="width:15%;">Cantidad</th>
								 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaDetPro">
								<td>{{arr.id}}</td>
								<td>{{arr.descripcion}}</td>
								<td>{{arr.cantidad}}</td>
								
							</tr>

							 
						</tbody>
					</table>
				</div>


		</div>


		 

	</div>

	<div class="modal-footer">
		 
		<button ng-click="cancelProDet()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 