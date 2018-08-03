angularRoutingApp.controller('dimensionesController', function( $scope,$compile,$modal,dimensionesServices) {
	
	$scope.$parent.titulo = 'Mantenimiento';
	$scope.$parent.subtitulo = 'Gestion de dimensiones de Clima Organizacional según Litwin y Stinger';

    $scope.fDim = {};
    $scope.busquedad='';
    //inicio paginacion//
    $scope.maxSize = 5;
    $scope.CurrentPage = 1;
    //fin //


    $scope.listarDimensiones = function(){

        dimensionesServices.listarDimensiones($scope.CurrentPage,$scope.busquedad).then(function(rpta){

            console.log(rpta.contador,'rptaaa ');
            $scope.arrListaDimensiones = rpta.data;
            $scope.TotalItems = rpta.contador[0].contador;
            
        });
    }

    $scope.listarDimensiones('');

    $scope.setPage = function (pageNo) {
      $scope.CurrentPage = pageNo;
    };

    $scope.pageChanged = function() {
      
      console.log($scope.CurrentPage, ' numero pagina');
        dimensionesServices.listarDimensiones($scope.CurrentPage,$scope.busquedad).then(function(rpta){

            $scope.arrListaDimensiones = rpta.data;
                        
        });

    };


    $scope.openform = function(par,cod){

        $scope.fDim = {};

        modalPer = $modal.open({
            templateUrl: baseUrl+'dimensiones/ver_popupdimensiones',
            scope: $scope,
            windowClass: 'xs-dialog'
             
        });

        $scope.cancelDim = function(){
            modalPer.dismiss('cancel');
        }
        

       if(cod!=''){
            //listar
            dimensionesServices.listarestaDimension(cod).then(function( rpta ){
                console.log(rpta,'rpta');
                
                $scope.fDim.id= cod;
                $scope.fDim.nombre = rpta[0].nomdim;
                $scope.fDim.descripcion = rpta[0].desdim;

            });
        }

        $scope.guardarDim = function(){
            if(par=='reg'){
                dimensionesServices.registrarDimensiones($scope.fDim).then(function( rpta ) {
        
                                console.log("rpta save",rpta);
                                modalPer.dismiss('cancel'); 
                                $scope.listarDimensiones('');
                });

                 
            }
            else {

                dimensionesServices.editarDimension($scope.fDim).then(function( rpta ) {
        
                                console.log("rpta editar",rpta);
                                modalPer.dismiss('cancel'); 
                                $scope.listarDimensiones('');
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

                dimensionesServices.eliminarDimension(cod).then(function(rpta){
                    console.log("rpta eliminar",rpta);
                    modalDelPer.dismiss('cancel'); 
                    $scope.listarDimensiones('');
                });

        }
    }


 });

angularRoutingApp.service("dimensionesServices",function( $http, $q ) {
    return({
        listarDimensiones: listarDimensiones,
        registrarDimensiones:registrarDimensiones,
        listarestaDimension : listarestaDimension,
        editarDimension : editarDimension,
        eliminarDimension : eliminarDimension,
        listarDimensionesCbo:listarDimensionesCbo,
        listarDimensionesCbo2:listarDimensionesCbo2,
        listarDimensionesCue: listarDimensionesCue
        
    }); 

    function listarDimensiones(pag,busqueda) {

        if(busqueda==''){
            busqueda='empty';
        }

        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/listar_dimensiones/"+pag+"/"+busqueda
        });
        return( request.then( handleSuccess,handleError ) );
    }
    

    function registrarDimensiones (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/registrar_dimensiones",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }


    function listarestaDimension(dimId) {
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/listar_esta_dimension/"+dimId
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function editarDimension (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/editar",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function eliminarDimension(dimId) {
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/eliminar_dimensiones/"+dimId
        });
        return( request.then( handleSuccess,handleError ) );
    }
    
    function listarDimensionesCbo() {
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/listar_dimensiones_cbo/"
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function listarDimensionesCbo2() {
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/listar_dimensiones_cbo2/"
        });
        return( request.then( handleSuccess,handleError ) );
    }

     function listarDimensionesCue(pag) {
        var request = $http({
            method: "post",
            url: baseUrl+"dimensiones/listar_dimensiones_pag/"+pag
        });
        return( request.then( handleSuccess,handleError ) );
    }
    
});
