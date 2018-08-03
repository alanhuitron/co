angularRoutingApp.controller('ConfiguracionDocumento', function($scope,ConfiguracionDocumentoServices) {
	
	$scope.$parent.titulo = 'Configuracion Documento';
	$scope.$parent.subtitulo = '';


    $scope.showAlert=false;
    $scope.listarConfiguracion = function(){

        ConfiguracionDocumentoServices.listarconfiguracion().then(function(rpta){

            $scope.arrLista = rpta;
             
        });
    }

	 $scope.listarConfiguracion();

     $scope.actualizar = function(){
        
        $scope.showAlert=true;
           ConfiguracionDocumentoServices.actualizarConfiguracion($scope.arrLista).then(function( rpta ) {
               console.log(rpta);
                if(rpta[0].flag == 1) {
                     $scope.showAlert=true;
                     console.log('si');
                } else if(rpta[0].flag == 0) {
                    $scope.showAlert=false;
                    console.log('no');
                }
                
                // $scope.listarConfiguracionPregunta
                // $scope.$parent.unblockUI();
                
            });
     }
    
    $scope.clickAlertequis = function(){
        $scope.showAlert=false;
        console.log('entro');
    }
});

angularRoutingApp.service("ConfiguracionDocumentoServices",function( $http, $q ) {
    return({
        listarconfiguracion: listarconfiguracion,
        actualizarConfiguracion:actualizarConfiguracion
         
        
    }); 

    function listarconfiguracion() {
        var request = $http({
            method: "post",
            url: baseUrl+"configuracion_documento/listar_coniguracion"
        });
        return( request.then( handleSuccess,handleError ) );
    }

     function actualizarConfiguracion(datos){
        
        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url:baseUrl+"configuracion_documento/editar_configuracion",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );

    }


      

    
 
});