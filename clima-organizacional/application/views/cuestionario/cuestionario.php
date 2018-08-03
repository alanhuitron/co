<div class="row" ng-controller="cuestionarioController" >

	<div class="col-md-12 col-sm-12">
		<div class="portlet light">
			<div class="portlet-title">

				<div class="row">
					<div class="form-group col-md-3 col-sm-3">
						<label> <b> Periodo:</b> </label> <?php echo $this->session->userdata('periodo'); ?>
						<!--<input type="text" class="form-control input-sm" ng-model="fCue.periodo">-->
					</div>

					<div class="form-group col-md-6 col-sm-6">
						<label> <b> Descripción:</b> </label>	{{fCue.arrDetalle.cuestionario.descue}} 
						 
					</div>

				</div>
 				
 				<div class="row">
 					<div class="form-group col-md-5 col-sm-5">
						<label> <b> Division: </b> </label> 	 <?php echo $this->session->userdata('nomdivision'); ?>
  
					</div>

					<div class="form-group col-md-1 col-sm-1">
						<label><b>Edad:</b></label> <?php echo $this->session->userdata('edad'); ?>
						 
					</div>

					<div class="form-group col-md-3 col-sm-3">
						<label><b>Cargo:</b></label> <?php echo $this->session->userdata('cargo'); ?>
						 
					</div>

					<div class="form-group col-md-3 col-sm-3">
						<label> <b>Sueldo:</b></label> <?php echo 'S/. '.$this->session->userdata('salario'). ' Soles'; ?>
						 
					</div>

					<div class="form-group col-md-3 col-sm-3">
						<label><b>Fecha Ingreso:</b></label> <?php echo $this->session->userdata('fecingreso'); ?>
						 
					</div>

 				</div>

 				<div class="row">
 						<div class="form-group col-md-10 col-sm-10">

 						 
 							
							<!--<ul class="pagination">
								<li> <a> Dimensiones</a> </li>
								<li ng-click="ClickDimension(arr.iddimension)" ng-repeat="arr in NumlistaDimCue">
									<a>{{arr.iddimension}}</a>
								</li>
								
							</ul> -->

 						</div>

 						<div class="form-group col-md-2 col-sm-2">
 							<button class="btn green-haze btn-circle" ng-click="sendCuestionario()"><i class="fa fa-send"></i> Enviar Cuestionario</button>
 						</div>
 				</div>
			</div>

			<div class="portlet-body">
	 				<div class="row">
						<div class="col-md-12 col-sm-12">


							<div class="box box-success" ng-repeat="arr in fCue.arrDetalle.cuestionario.dimensiones">
									<div class="box-header with-border" ><b>DIMENSIÓN - {{arr.desdim}} </b></div>

									<div class="box-body">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="width:3%;">ID</th>
													<th style="width:92%;">Descripción</th>
													<th style="width:1%;">Totalmente de Acuerdo </th>
													<th style="width:1%;">De Acuerdo</th>
													<th style="width:1%;">Medianamente de acuerdo</th>
													<th style="width:1%;">En Desacuerdo</th>
													<th style="width:1%;">Totalmente Desacuerdo</th>
													
												</tr>
											</thead>
			
											<tbody>
												<tr ng-repeat="p in arr.variables  track by $index">
											    	<td>{{$index +1}}</td>	
													<td> {{p.desvar}}</td>
													<td> <input type="radio"  ng-model="p.valor" value="1"  > </td>
													<td> <input type="radio"  ng-model="p.valor" value="2"  > </td>
													<td> <input type="radio"  ng-model="p.valor" value="3"  > </td>
													<td> <input type="radio"  ng-model="p.valor" value="4"  > </td>
													<td> <input type="radio"  ng-model="p.valor" value="5"  > </td>
													 
													<!--<td>
														{{p.valor}}
													</td>-->
													
													
			
												</tr>
											</tbody>
										</table>
									</div>


							</div>




						<div class="form-group col-md-10 col-sm-10">
						</div>

						<div class="form-group col-md-2 col-sm-2">
 							<button class="btn green-haze btn-circle" ng-click="sendCuestionario()"><i class="fa fa-send"></i> Enviar Cuestionario</button>
 						</div>
							
						</div>
						



					</div>	


			</div>
		</div>
	</div>
</div>			 
					
			





