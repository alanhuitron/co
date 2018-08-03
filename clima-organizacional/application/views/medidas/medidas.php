<div class="row" ng-controller="medidaController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Medidas Correctivas </span>
				</div>

				<div class="actions btn-set">

					<div class="col-md-10 col-sm-10">

						<input type="text" class="form-control input-sm" ng-model="busquedamed" 
						ng-change="listaMedidas()" placeholder="Búsqueda ... ">
						

					</div>

					 
					
								
				</div>
 
			</div>

			<div class="portlet-body">
				<div class="">
					<table class="table table-bordered table-hover">
						<thead>

							<tr>
								<th style="width:3%;">ID</th>
								<th style="width:40%;">Medida</th>
								<th style="width:40%;">Variable</th>
								<th style="width:17%;">Dimension</th> 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaMedidas">
								<td>{{arr.idmedida}}</td>
								<td>{{arr.nommed}}</td>
								<td>{{arr.desvar}}</td>
								<td>{{arr.nomdim}}</td>
								 
							</tr>
						</tbody>
					</table>
				</div>


			</div>

			<pagination total-items="TotalItems" ng-model="CurrentPage" max-size="maxSize"  boundary-links="true" rotate="false" num-pages="numPages" ng-change="pageChanged()"></pagination>

		</div>
	</div>	
</div>