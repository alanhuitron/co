<div class="row" ng-controller="graficoHistoricoController">
	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">



				<div class="row" >
			
			 		<div class="form-group col-md-4 col-sm-4" >
						<label>Dimensión: </label>	
								<select class="form-control input-sm" ng-model="dimId" ng-change="traerGrafica()"
								 ng-options="filtro.iddimension as filtro.nomdim for filtro in listaDimensiones" ></select>
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