<div class="row" ng-controller="sugerenciaController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Sugerencias </span>
				</div>

				<div class="actions btn-set">

					<div class="col-md-10 col-sm-10">

						<input type="text" class="form-control input-sm" ng-model="busquedasug" 
						ng-change="listarSugerencias()" placeholder="Búsqueda ... ">
						

					</div>

					 
								
				</div>
 
			</div>

			<div class="portlet-body">
				<div class="">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:3%;">ID</th>
								<th style="width:20%;">Nombre</th>
								<th style="width:30%;">Descripción</th>
								<th style="width:30%;">Respueta</th>
								<th style="width:17%;">Opciones</th> 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaSugerencias">

							
								<td>{{arr.idsugerencia}}</td>
								<td>{{arr.nomsug}}</td>
								<td>{{arr.dessug}}</td>
								<td ng-if="arr.desres!=null">{{arr.desres}}</td>
								<td ng-if="arr.desres==null">Sin respuesta</td>
								<td >
									<button type="button" ng-click="addRes(arr.idsugerencia)" class="btn blue" title="Añadir Respuesta"> <i class="glyphicon glyphicon-plus"></i></button>
									<button type="button" ng-click="deleteSugerencia(arr.idsugerencia)" class="btn red" title="Archivar"> <i class="glyphicon glyphicon-remove"></i></button>
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