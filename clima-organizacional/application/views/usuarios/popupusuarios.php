 

<div class="modal-content"  >
	
	<div class="modal-header">
		<h3> <b>Registro</b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">
				<div class="form-group col-md-6 col-sm-6">
					<label>Nombre</label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.nombres">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Apellidos</label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.apellidos">
				</div>
 	
 				<div class="form-group col-md-6 col-sm-6">
					<label>Email</label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.email">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>DNI</label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.dni">
				</div>
				
				<div class="form-group col-md-12 col-sm-12">
					<label>Division </label>	
					<select class="form-control input-sm" ng-model="fUsu.iddivision"
					 ng-options="filtro.iddivision as filtro.nomdivision for filtro in listaDivision" ></select>
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Cargo </label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.cargo">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Salario </label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.salario">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Edad </label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.edad">
				</div>

				<div class="form-group col-md-6 col-sm-6">
					<label>Fecha Ingreso </label>	
					<input type="text" class="form-control input-sm" ng-model="fUsu.fecingreso">
				</div>

				<div class="form-group col-md-12 col-sm-12">
					<label>Perfil </label>	
					<select class="form-control input-sm" ng-model="fUsu.idperfil"
					 ng-options="filtro.idperfil as filtro.nomper for filtro in listaPerfiles" ></select>
				</div>

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarUsu()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelUsu()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 
 