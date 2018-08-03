<div class="row" ng-controller="problemaController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Problemas Identificados </span>
				</div>

				<div class="actions btn-set">

					 

					 
					
								
				</div>
 
			</div>

			<div class="portlet-body">
				<div class="">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="5%">ID</th> 
								<th style="width:10%;">Dimensión</th>
								<th style="width:55%;">Variable</th>
								<th style="width:10%;">Problema</th> 
								<th style="width:20%;">Opciones</th> 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaProblemas track by $index">
								<td>{{$index+1}}</td>
								<td>{{arr.nomdim}}</td>
								<td>{{arr.desvar}}</td>

								<td ng-if="arr.respuesta==5"><span class="label label-danger">   PROBLEMA GRAVE	</span></td>
								<td ng-if="arr.respuesta==4"><span class="label label-warning"> PROBLEMA PELIGROSO</span></td>
								<td ng-if="arr.respuesta<=3"><span class="label label-success"> PROBLEMA MENOR		</span></td>


								 
								<td >
									<button type="button" ng-click="openformDetalleProblemas(arr.idvariable)" class="btn blue" title="Ver Información Detallado"> <i class="glyphicon glyphicon-edit"></i></button>
									<button type="button" ng-click="openformEstrategias(arr.idvariable)" class="btn green" title="ver Estrategias"> <i class="glyphicon glyphicon-edit"></i></button>
									<button type="button" ng-click="openformMedidas(arr.idvariable)" class="btn yellow" title="Añadir Medidas Correctivas"> <i class="glyphicon glyphicon-plus"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>


			</div>

			<pagination total-items="TotalItems" ng-model="CurrentPage" max-size="maxSize"  boundary-links="true" rotate="false" num-pages="numPages" ng-change="pageChanged()"></pagination>

		</div>
	</div>	
</div>