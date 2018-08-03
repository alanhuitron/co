<div class="row" ng-controller="inicioController">
	<div class="form-group col-md-12 col-sm-12">
		<div class="box box-success">
			<div class="box-header with-border">
              <h3 class="box-title">DASHBOARD DEL SISTEMA</h3>
            </div>

            <div class="box-body">

            	<?php if($this->session->userdata('perfil') == 1) { ?> 
            	
                <!-- USUARIOS -->   
                <div class="form-group col-md-3 col-sm-3">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>1</h3>
            
                          <p>Perfiles </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#perfiles" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div>

                <!-- USUARIOS -->	
				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-aqua">
    			        <div class="inner">
    			          <h3>2</h3>
			
    			          <p>Usuarios </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-person-add"></i>
    			        </div>
    			        <a href="#usuarios" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- DIMENSIONES -->
 				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-green">
    			        <div class="inner">
    			          <h3>3</h3>
			
    			          <p>Dimensiones </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#dimensiones" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- VARIABLES -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow">
    			        <div class="inner">
    			          <h3>4</h3>
			
    			          <p>Variables </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- CUESTIONARIO -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-red">
    			        <div class="inner">
    			          <h3>5</h3>
			
    			          <p>Cuestionario </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#reg-cuestionario" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO VARIABLE -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-blue">
    			        <div class="inner">
    			          <h3>6</h3>
			
    			          <p>Gráfico por Variables </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO DIMENSIONES -->
 				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-red-soft">
    			        <div class="inner">
    			          <h3>7</h3>
			
    			          <p>Gráficos por Dimensiones </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-stats-bars"></i>
    			        </div>
    			        <a href="#graficos-dimensiones" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO HISTORICO -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-green-meadow">
    			        <div class="inner">
    			          <h3>8</h3>
			
    			          <p>Gráfico Histórico </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-historicos" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			 
                <div class="form-group col-md-3 col-sm-3">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>9</h3>
            
                          <p>Sugerencias </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-document"></i>
                        </div>
                        <a href="#sugerencias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div>

    			<!-- PROBLEMAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-casablanca">
    			        <div class="inner">
    			          <h3>10</h3>
			
    			          <p>Problemas </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#problemas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- ESTRATEGIAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-crusta">
    			        <div class="inner">
    			          <h3>11</h3>
			
    			          <p>Estrategias </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#estrategias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

                

    			<?php } ?>


    			<?php if($this->session->userdata('perfil') == 2) { ?> 

    			<!-- CUESTIONARIO -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-red">
    			        <div class="inner">
    			          <h3>1</h3>
			
    			          <p>Cuestionario </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#reg-cuestionario" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO VARIABLE -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-blue">
    			        <div class="inner">
    			          <h3>2</h3>
			
    			          <p>Gráfico por Variables </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO DIMENSIONES -->
 				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-red-soft">
    			        <div class="inner">
    			          <h3>3</h3>
			
    			          <p>Gráficos por Dimensiones </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-stats-bars"></i>
    			        </div>
    			        <a href="#graficos-dimensiones" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO HISTORICO -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-green-meadow">
    			        <div class="inner">
    			          <h3>4</h3>
			
    			          <p>Gráfico Histórico </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-historicos" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    		 

    			<!-- PROBLEMAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-casablanca">
    			        <div class="inner">
    			          <h3>5</h3>
			
    			          <p>Problemas </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#problemas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- ESTRATEGIAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-crusta">
    			        <div class="inner">
    			          <h3>6</h3>
			
    			          <p>Estrategias </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#estrategias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>	

                <div class="form-group col-md-3 col-sm-3">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>7</h3>
            
                          <p>Sugerencias </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-document"></i>
                        </div>
                        <a href="#sugerencias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div>

                <div class="form-group col-md-3 col-sm-3">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>8</h3>
            
                          <p>Medidas  </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-document"></i>
                        </div>
                        <a href="#medidas-correctivas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div>


    			<?php } ?>

    			<?php if($this->session->userdata('perfil') == 3) { ?> 


    				<!-- DIMENSIONES -->
 				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-green">
    			        <div class="inner">
    			          <h3>1</h3>
			
    			          <p>Dimensiones </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#dimensiones" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- VARIABLES -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow">
    			        <div class="inner">
    			          <h3>2</h3>
			
    			          <p>Variables </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			
    				<!-- GRAFICO VARIABLE -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-blue">
    			        <div class="inner">
    			          <h3>3</h3>
			
    			          <p>Gráfico por Variables </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO DIMENSIONES -->
 				<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-red-soft">
    			        <div class="inner">
    			          <h3>4</h3>
			
    			          <p>Gráficos por Dimensiones </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-stats-bars"></i>
    			        </div>
    			        <a href="#graficos-variables" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- GRAFICO HISTORICO -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-green-meadow">
    			        <div class="inner">
    			          <h3>5</h3>
			
    			          <p>Gráfico Histórico </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-pie-graph"></i>
    			        </div>
    			        <a href="#graficos-historicos" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			 

    			<!-- PROBLEMAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-casablanca">
    			        <div class="inner">
    			          <h3>6</h3>
			
    			          <p>Problemas </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#problemas" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>

    			<!-- ESTRATEGIAS -->
    			<div class="form-group col-md-3 col-sm-3">
    			      <!-- small box -->
    			      <div class="small-box bg-yellow-crusta">
    			        <div class="inner">
    			          <h3>7</h3>
			
    			          <p>Estrategias </p>
    			        </div>
    			        <div class="icon">
    			          <i class="ion ion-document"></i>
    			        </div>
    			        <a href="#estrategias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    			      </div>
    			</div>	

                <!-- SUGERENCIAS -->
                 <div class="form-group col-md-3 col-sm-3">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>8</h3>
            
                          <p>Sugerencias </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-document"></i>
                        </div>
                        <a href="#sugerencias" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                </div>


    			<?php } ?>



 			</div>

 		</div>
 	</div>

</div>