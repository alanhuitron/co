angularRoutingApp.controller('articuloController', function($scope) {
	
	$scope.$parent.titulo = 'Articulos';
	$scope.$parent.subtitulo = 'gestion de articulos';
	 
});

angularRoutingApp.service("articuloServices",function( $http, $q ) {
    return({
        listararticulos: listararticulos
        
    }); 

    function listararticulos(articuloId) {
        var request = $http({
            method: "post",
            url: baseUrl+"articulo/listar_este_articulo/"+articuloId
        });
        return( request.then( handleSuccess,handleError ) );
    }

    
 
});