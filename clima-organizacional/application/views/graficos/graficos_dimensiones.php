<div class="row" ng-controller="graficoDimensionesController">


	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">



				<div class="row" >
			
			
					<div class="form-group col-md-4 col-sm-4">
						<label>Tipo de Gráfico: </label>
						<select class="form-control input-sm" ng-model="grafiId" ng-change="traerGrafico()">
							<option value="0"> -- Seleccione un Tipo de Gráfico -- </option>
							<option value="1"> BARRAS </option>
							<option value="2"> PIE </option>
						</select>
					</div>
			
					

					<div class="form-group col-md-4 col-sm-4" ng-show="showComplement" >

					<label>Criterio: </label>
						<select class="form-control input-sm" ng-model="CriterioId" ng-change="traerGrafico()" >
							<option value="0"> -- Seleccione un Criterio -- </option>
							<option value="1"> Totalmente de Acuerdo </option>
							<option value="2"> De acuerdo </option>
							<option value="3"> Medianamente de acuerdo</option>
							<option value="4"> En Desacuerdo </option>
							<option value="5"> Totalmente en Desacuerdo </option>
						</select>	
					</div>
				</div>
			</div>	

			<div class="portlet-body">
					<div class="row">

						
						 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-12 col-sm-12" ></div>
						 
					</div>
			</div>	
		
		</div>
	</div>
</div>