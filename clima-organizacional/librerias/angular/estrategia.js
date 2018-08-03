angularRoutingApp.controller('estrategiaController', function( $scope,$compile,$modal,estrategiasServices,dimensionesServices,variablesServices) {
	
	$scope.$parent.titulo = 'Mantenimiento';
	$scope.$parent.subtitulo = 'Gestion de Estrategias';

    $scope.fEstra = {};
    $scope.busquedaestra='';
    //inicio paginacion//
    $scope.maxSize = 5;
    $scope.CurrentPage = 1;
    //fin //


    $scope.listarestrategias = function(){

        estrategiasServices.listarestrategias($scope.CurrentPage,$scope.busquedaestra).then(function(rpta){

            console.log(rpta.contador,'rptaaa ');
            $scope.arrListaestrategias = rpta.data;
            $scope.TotalItems = rpta.contador[0].contador;
            
        });
    }

    $scope.listarestrategias('');

    $scope.setPage = function (pageNo) {
      $scope.CurrentPage = pageNo;
    };

    $scope.pageChanged = function() {
      
      console.log($scope.CurrentPage, ' numero pagina');
        estrategiasServices.listarestrategias($scope.CurrentPage,$scope.busquedaestra).then(function(rpta){

            $scope.arrListaestrategias = rpta.data;
                        
        });

    };


    $scope.openform = function(par,cod){

        $scope.fEstra = {};
        $scope.fEstra.arrEstrategias = [
                {nombre:''} 
            ];


        $scope.listaCboDimensiones = function(){
            dimensionesServices.listarDimensionesCbo().then(function(response){
    
                console.log(response,'response cbo dimensiones ');
    
                $scope.listaDimensiones = response;
                $scope.listaDimensiones.splice(0,0,{ iddimension : '-', nomdim:'--Seleccione Dimension --'});
                if(cod=='') {$scope.fEstra.dimId =  $scope.listaDimensiones[0].iddimension;}
    
            });
        }

        $scope.listaCboDimensiones();


        $scope.listaVariablesCbo = function(){
            variablesServices.listarVariablesxDimensionesCbo($scope.fEstra.dimId).then(function(response){

                $scope.listaVariables = response;
                $scope.listaVariables.splice(0,0,{ idvariable : '-', desvar:'--Seleccione Variable --'});
                if(cod=='') {$scope.fEstra.varId =  $scope.listaVariables[0].idvariable;}

            });
        }

        $scope.pushEstrategia = function(){

            $scope.fEstra.arrEstrategias.push({nombre:''});
            
 
        }

        modalEstra = $modal.open({
            templateUrl: baseUrl+'estrategias/ver_popupestrategias',
            scope: $scope,
            windowClass: 'md-dialog'
             
        });

        $scope.cancelEstra = function(){
            modalEstra.dismiss('cancel');
        }
        

       if(cod!=''){
            //listar
            estrategiasServices.listarEstaEstrategia(cod).then(function( rpta ){
                console.log(rpta,'rpta');
                
                $scope.fEstra.id= cod;

                $scope.fEstra.arrEstrategias[0].nombre = rpta[0].nomestra;
                
                $scope.fEstra.dimId = rpta[0].iddimension;

                $scope.listaVariablesCbo();
                $scope.fEstra.varId = rpta[0].idvariable;

            });
        }
        else{

            

        }

        $scope.guardarEstra = function(){
            if(par=='reg'){
                estrategiasServices.registrarestrategias($scope.fEstra).then(function( rpta ) {
        
                                console.log("rpta save",rpta);
                                modalEstra.dismiss('cancel'); 
                                $scope.listarestrategias('');
                });

                 
            }
            else {

                estrategiasServices.editarDimension($scope.fEstra).then(function( rpta ) {
        
                                console.log("rpta editar",rpta);
                                modalEstra.dismiss('cancel'); 
                                $scope.listarestrategias('');
                });
            }
        }
    }

    $scope.deleteform = function(cod){

        

        modalDelPer = $modal.open({
            templateUrl: baseUrl+'login/ver_popup_confirmacion',
            scope: $scope,
            windowClass: 'md-dialog'
             
        });

        $scope.cancelCon = function(){
            modalDelPer.dismiss('cancel');
        }

        $scope.guardarCon = function(){

                estrategiasServices.eliminarestrategias(cod).then(function(rpta){
                    console.log("rpta eliminar",rpta);
                    modalDelPer.dismiss('cancel'); 
                    $scope.listarestrategias('');
                });

        }
    }


 });

angularRoutingApp.service("estrategiasServices",function( $http, $q ) {
    return({
        listarestrategias: listarestrategias,
        registrarestrategias:registrarestrategias,
        listarEstaEstrategia : listarEstaEstrategia,
        editarDimension : editarDimension,
        eliminarestrategias : eliminarestrategias 
        
    }); 

    function listarestrategias(pag,busqueda) {

        if(busqueda==''){
            busqueda='empty';
        }

        var request = $http({
            method: "post",
            url: baseUrl+"estrategias/listar_estrategias/"+pag+"/"+busqueda
        });
        return( request.then( handleSuccess,handleError ) );
    }
    

    function registrarestrategias (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"estrategias/registrar_estrategias",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }


    function listarEstaEstrategia(estId) {
        var request = $http({
            method: "post",
            url: baseUrl+"estrategias/listar_esta_estrategia/"+estId
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function editarDimension (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"estrategias/editar",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function eliminarestrategias(estId) {
        var request = $http({
            method: "post",
            url: baseUrl+"estrategias/eliminar_estrategias/"+estId
        });
        return( request.then( handleSuccess,handleError ) );
    }
    
    
});