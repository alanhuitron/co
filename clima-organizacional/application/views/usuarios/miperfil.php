<div class="row" ng-controller="usuariosController">

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">  Mi Perfil</span>
				</div>

				
 
			</div>

			<div class="portlet-body">
				
			 	<div class="row">
					<div class="form-group col-md-6 col-sm-6">
						<label>Nombre</label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.nombres" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Apellidos</label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.apellidos" disabled> 
					</div>
 		
 					<div class="form-group col-md-6 col-sm-6">
						<label>Email</label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.email" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>DNI</label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.dni" disabled>
					</div>
					
					<div class="form-group col-md-6 col-sm-6">
						<label>Division </label>	
						<select class="form-control input-sm" ng-model="fMip.iddivision"
						 ng-options="filtro.iddivision as filtro.nomdivision for filtro in listaDivision" disabled></select>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Cargo </label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.cargo" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Salario </label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.salario" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Edad </label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.edad" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Fecha Ingreso </label>	
						<input type="text" class="form-control input-sm" ng-model="fMip.fecingreso" disabled>
					</div>
	
					<div class="form-group col-md-6 col-sm-6">
						<label>Perfil </label>	
						<select class="form-control input-sm" ng-model="fMip.idperfil"
						 ng-options="filtro.idperfil as filtro.nomper for filtro in listaPerfiles" disabled></select>
					</div>

					 

					<div class="form-group col-md-5 col-sm-5">
						 	
						 
					</div>

					<div class="form-group col-md-6 col-sm-6">
						<button class="btn green-haze btn-circle" ng-click="changePassword()"> Cambiar Contraseña</button>	
						 
					</div>


				</div>

			</div>

			

		</div>
	</div>	
</div>
