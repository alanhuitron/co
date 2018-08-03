<div class="row" ng-controller="usuariosController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Lista de Usuarios </span>
				</div>

				<div class="actions btn-set">

					<div class="col-md-8 col-sm-8">

						<input type="text" class="form-control input-sm" ng-model="busquedau" 
						ng-change="listarUsuarios()" placeholder="Búsqueda ... ">
						

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
								<th style="width:20%;">Nombres</th>
								<th style="width:10%;">Usuario</th>
								<th style="width:10%;">DNI</th> 
								<th style="width:15%;">Perfil</th> 
								<th style="width:15%;">División</th> 
								<th style="width:10%;">Estado</th> 
								<th style="width:17%;">Opciones</th> 
							</tr>
							
						</thead>

						<tbody>
							<tr ng-repeat="arr in arrListaUsuarios">
								<td>{{arr.idusuario}}</td>
								<td>{{arr.nombres}} {{arr.apellidos}}</td>
								<td>{{arr.nomusu}}</td>
								<td>{{arr.dni}}</td>
								<td>{{arr.nomper}}</td>
								<td>{{arr.nomdivision}}</td>

								<td ng-if="arr.estusu==0"><span class="label label-danger">INACTIVO	</span></td>
								<td ng-if="arr.estusu==1"><span class="label label-warning">POR ACTIVAR</span></td>
								<td ng-if="arr.estusu==2"><span class="label label-success">ACTIVO		</span></td>

								<td >
									<button type="button" ng-click="openform('edit',arr.idusuario)" class="btn blue" title="Editar"> <i class="glyphicon glyphicon-edit"></i></button>
									<button ng-if="arr.estusu==2" type="button" ng-click="deleteform(arr.idusuario)" class="btn red" title="Desactivar"> <i class="glyphicon glyphicon-remove"></i></button>
									<button ng-if="arr.estusu==1" type="button" ng-click="activarform(arr.idusuario)" class="btn green" title="Activar"> <i class="glyphicon glyphicon-check"></i></button>
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
