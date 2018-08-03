<div class="row" ng-controller="estrategiaController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Estrategias </span>
				</div>

				<div class="actions btn-set">

					<div class="col-md-8 col-sm-8">

						<input type="text" class="form-control input-sm" ng-model="busquedaestra" ng-change="listarestrategias()" placeholder="Búsqueda ... ">
						

					</div>

					<div class="col-md-3 col-sm-3">
						<button class="btn green-haze btn-circle" ng-click="openform('reg','')"><i class="fa fa-plus"></i> Nuevo</button>
					</div>
					
								
				</div>
 
			</div>

			<div class="portlet-body">
				<div class="">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:3%;">ID</th>
								<th style="width:40%;">Estrategia</th>
								<th style="width:40%;">Descripción</th>
								<th style="width:17%;">Opciones</th> 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaestrategias">
								<td>{{arr.idestrategia}}</td>
								<td>{{arr.nomestra}}</td>
								<td>{{arr.desvar}}</td>
								<td >
									<button type="button" ng-click="openform('edit',arr.idestrategia)" class="btn blue" title="Editar"> <i class="glyphicon glyphicon-edit"></i></button>
									<button type="button" ng-click="deleteform(arr.idestrategia)" class="btn red" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></button>
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