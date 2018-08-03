<div class="row" ng-controller="cuestionarioController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Cuestionarios </span>
				</div>

				<div class="actions btn-set">
					<div class="col-md-8 col-sm-8">

						<input type="text" class="form-control input-sm" ng-model="busquedacu" 
						ng-change="listarCuestionariosPag()" placeholder="Búsqueda ... ">
						

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
								<th style="width:35%;">Cuestionario</th>
								<th style="width:25%;">Periodo</th>
								<th style="width:20%;">Tipo</th>
								<th style="width:17%;">Opciones</th>
							  
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaCuestionariosPag">
								<td>{{arr.idcuestionario}}</td>
								<td>{{arr.descue}}</td>
								<td>{{arr.mesini}} - {{arr.mesfin}} de {{arr.anio}}</td>

								 
								<td ng-if="arr.estper==0"><span class="label label-warning">PASADO       </span></td>
								<td ng-if="arr.estper==1"><span class="label label-success">ACTIVO		</span></td>

								<td >
									<button type="button" ng-click="VerDetalle(arr.idcuestionario)" class="btn blue" title="Ver Detalle"> <i class="glyphicon glyphicon-eye-open"></i></button>
									
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