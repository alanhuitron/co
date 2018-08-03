angularRoutingApp.controller('cuestionarioController', function( $scope,$compile,$modal,cuestionariosServices,dimensionesServices
    ,variablesServices) {
	
    $scope.fCue = {};
    $scope.fSug = {};

    $scope.fCue.arrDetalle = [];
    
    $scope.listaCuestionario = {};
    $scope.$parent.titulo = 'Cuestionario';
    $scope.$parent.subtitulo = 'Ingreso de respuestas';
    
    $scope.busquedacu='';
    //inicio paginacion//
    $scope.maxSize = 5;
    $scope.CurrentPage = 1;


    $scope.listarCuestionariosPag = function(){

        cuestionariosServices.listarCuestionariopag($scope.CurrentPage,$scope.busquedacu).then(function(rpta){

            console.log(rpta.contador,'rptaaa ');
            $scope.arrListaCuestionariosPag = rpta.data;
            $scope.TotalItems = rpta.contador[0].contador;
            
        });
    }

    $scope.listarCuestionariosPag('');

    $scope.setPage = function (pageNo) {
      $scope.CurrentPage = pageNo;
    };

    $scope.pageChanged = function() {
      
      console.log($scope.CurrentPage, ' numero pagina');
        cuestionariosServices.listarCuestionariopag($scope.CurrentPage,$scope.busquedacu).then(function(rpta){

            $scope.arrListaCuestionariosPag = rpta.data;
                        
        });

    };

    $scope.VerDetalle = function(codigo){

        
    }

    $scope.openform = function(par,cod){

        $scope.fCueA = {};

        modalCueA = $modal.open({
            templateUrl: baseUrl+'cuestionario/ver_popupcueasi',
            scope: $scope,
            windowClass: 'xs-dialog'
             
        });

        $scope.cancelCueA = function(){
            modalCueA.dismiss('cancel');
        }
        

       

        $scope.guardarCueA = function(){


            if(par=='reg'){
                cuestionariosServices.registrarCuestionarioAsi($scope.fCueA).then(function( rpta ) {
        
                                console.log("rpta save",rpta);
                                modalCueA.dismiss('cancel'); 
                                $scope.listarCuestionariosPag('');
                });

                 
            }
           
        }
    }











    $scope.inicio = function(){
        
    
        
        $scope.listarAllCuestinarios();
        $scope.listaCboDivision();


    }

	
    
 

   

    $scope.ClickDimension = function(dimId){

        console.log(dimId,'dimiD');



    }
    
    $scope.listarAllCuestinarios = function(){
        cuestionariosServices.listarCuestionario().then(function(rpta){
    
            $scope.fCue.arrDetalle = rpta;
            $scope.fCue.idcue=rpta.cuestionario.idcuestionario;
            $scope.fCue.descue=rpta.cuestionario.descue;


            console.log($scope.fCue.arrDetalle,'arr lista cuestionario');
        });
    }
  

    $scope.listaCboDivision = function(){


            cuestionariosServices.listarDivisiones().then(function(response){
    
                console.log(response,'response cbo divisiones ');
    
                $scope.listaDivision = response;
                $scope.listaDivision.splice(0,0,{ iddivision : '-', nomdivision:'--Seleccione Division --'});
               
                $scope.fCue.arrDetalle.cuestionario.iddivision=  $scope.listaDivision[0].iddivision;
                console.log($scope.listaDivision[0].iddivision,'iddvii');
    
            });
    }

    $scope.inicio();
    
    $scope.sendCuestionario = function(){

        modalConfReg = $modal.open({
            templateUrl: baseUrl+'sugerencia/verpopupsugerencia',
            scope: $scope,
            windowClass: 'md-dialog'
             
        });

        $scope.cancelVar = function(){
            modalConfReg.dismiss('cancel');
        }

        $scope.guardarCue = function(){

                cuestionariosServices.registrarCuestionario($scope.fCue.arrDetalle).then(function(rpta){
                    
                    cuestionariosServices.registrarSugerencia($scope.fSug).then(function(dta){
                                modalConfReg.dismiss('cancel'); 
                                console.log('registrado');
                                 
                    });
                    
                });

        }

        
    }

});

 angularRoutingApp.service("cuestionariosServices",function( $http, $q ) {
    return({
        listarCuestionario :  listarCuestionario,
        listarCuestionariopag :  listarCuestionariopag,
        listarDivisiones:listarDivisiones,
        registrarCuestionario:registrarCuestionario,
        registrarSugerencia:registrarSugerencia,
        registrarCuestionarioAsi : registrarCuestionarioAsi
        
    }); 

     
    
 
    function listarCuestionario() {
        var request = $http({
            method: "post",
            url: baseUrl+"cuestionario/listar_cuestionarios/"
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function listarCuestionariopag(pag,busqueda) {

        if(busqueda==''){
            busqueda='empty';
        }

        var request = $http({
            method: "post",
            url: baseUrl+"cuestionario/listar_cuestionarios_pag/"+pag+"/"+busqueda
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function listarDivisiones() {
        var request = $http({
            method: "post",
            url: baseUrl+"division/listar_divisiones_cbo/"
        });
        return( request.then( handleSuccess,handleError ) );
    }
 


    function registrarCuestionario (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"cuestionario/registrar_cuestionario",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function registrarSugerencia (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"sugerencia/registrar_sugerencia",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

    function registrarCuestionarioAsi (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"cuestionario/registrar_cuestionario_asi",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

});