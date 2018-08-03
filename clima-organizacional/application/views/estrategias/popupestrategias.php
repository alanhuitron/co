<div class="modal-content">
	
	<div class="modal-header">
		<h3> <b>Registro </b></h3>
	</div>

	<div class="modal-body">
		
		<form name="Form">
			
			<div class="row">
				
				<div class="form-group col-md-12 col-sm-12">
					<label>Dimension </label>	
					<select class="form-control input-sm" ng-model="fEstra.dimId"
					 ng-options="filtro.iddimension as filtro.nomdim for filtro in listaDimensiones" ng-change="listaVariablesCbo()"></select>
				</div>
 				
 				<div class="form-group col-md-12 col-sm-12">
					<label>Variable </label>	
					<select class="form-control input-sm" ng-model="fEstra.varId"
					 ng-options="filtro.idvariable as filtro.desvar for filtro in listaVariables" ></select>
				</div>

				<div ng-repeat = "arr in fEstra.arrEstrategias track by $index">
					<div class="form-group col-md-12 col-sm-12">
						<label>Estrategia {{$index +1}}</label>	
						<input type="text" class="form-control input-sm" ng-model="arr.nombre">
					</div>
				</div>
				<a ng-click="pushEstrategia()"> Más </a>

			</div>
		</form>

	</div>

	<div class="modal-footer">
		<button ng-click="guardarEstra()" class="btn btn-success" >Guardar</button>
		<button ng-click="cancelEstra()" class="btn btn-warning">Cerrar</button>
	</div>
</div> 