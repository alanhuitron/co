

<div class="row" ng-controller="graficoVariablesController">


	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">



				<div class="row" >
			
			
					<div class="form-group col-md-4 col-sm-4">
						<label>Tipo de Gráfico: </label>
						<select class="form-control input-sm" ng-model="tipoGraficoId" ng-change="traerGraficos()">
							<option value="0"> -- Seleccione un Tipo de Gráfico -- </option>
							<option value="1"> PIE </option>
							<option value="2"> BARRAS </option>
						</select>
					</div>
			
					<div class="form-group col-md-4 col-sm-4" >
						<label>Dimensión: </label>	
								<select class="form-control input-sm" ng-model="dimId" ng-change="traerGraficos()"
								 ng-options="filtro.iddimension as filtro.nomdim for filtro in listaDimensiones" ></select>
					</div>
				</div>
			</div>	

			<div class="portlet-body">
					<div class="row">

						
						<div ng-show="contadorVar>=1" id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=2" id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=3" id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=4" id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=5" id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=6" id="container6" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=7" id="container7" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=8" id="container8" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=9" id="container9" style="min-width: 310px; height: 400px; margin: 0 auto"  class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=10" id="container10" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=11" id="container11" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=12" id="container12" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=13" id="container13" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=14" id="container14" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=15" id="container15" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=16" id="container16" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=17" id="container17" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=18" id="container18" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=19" id="container19" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
						<div ng-show="contadorVar>=20" id="container20" style="min-width: 310px; height: 400px; margin: 0 auto" class="col-md-6 col-sm-6" ></div>
					</div>
			</div>	
		
		</div>
	</div>
</div>
	
<!-- 
<div ng-repeat="arr in listadatapievariable.dimension">
	<div ng-repeat="al in arr.variables">
	<b>{{al.variable}}</b>
		   
	</div>
</div>-->

 

 

	



