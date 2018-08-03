angularRoutingApp.controller('detalleFacturaController', function(DTOptionsBuilder, DTColumnBuilder, DTInstances,$compile,$scope,$filter,$modal,detalleFacturaServices) {
	
	$scope.$parent.titulo = 'Detalle Factura';
	// $scope.$parent.subtitulo = 'gestion de clientes juridicos';
	 
	 


	$scope.renderTable = function(){


             
        var pUrl = baseUrl+"factura/listar_detalle_factura/DOC"; 

        $scope.dtlistaDetalleFacturas = DTOptionsBuilder.fromSource(pUrl)
            //.withScroller()
            .withPaginationType('full_numbers')
            .withOption('deferRender',true) 
            .withOption('scrollY',250)
            .withOption('createdRow', createdRow);


        $scope.listaDetalleFacturas = {
            dtOptions : $scope.dtlistaDetalleFacturas,
            dtColumns : [
                DTColumnBuilder.newColumn('cod_doc').withTitle('DOCUMENTO'),
                DTColumnBuilder.newColumn('cod_prod').withTitle('PRODUCTO'),
                DTColumnBuilder.newColumn('nombre').withTitle('NOMBRE'),
                DTColumnBuilder.newColumn('descripcion').withTitle('DESCRIPCION'),
                DTColumnBuilder.newColumn('cantidad').withTitle('CANTIDAD'),
                DTColumnBuilder.newColumn('pre_unit').withTitle('PRECIO')
                
                 
                

                // DTColumnBuilder.newColumn(null).withTitle('ACCIONES').notSortable().renderWith($scope.actionsHtml)
            ]
        };
        
         


        DTInstances.getLast().then(function (dtInstance) {
            //console.log(dtInstance);
            $scope.dtInstanceFactura = dtInstance;
        });

       
         

        function createdRow(row, data, dataIndex) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }

    }

     $scope.renderTable();
    
    $scope.BuscaDetalle = function(busqueda){

    	console.log(busqueda);
    	
    	$scope.renderTable();
    	 
        var pUrl = baseUrl+"factura/listar_detalle_factura/"+ busqueda; 
        
        $scope.listaDetalleFacturas.dtOptions.withSource(pUrl);
    }
    

});

angularRoutingApp.service("detalleFacturaServices",function( $http, $q ) {
    return({
        buscarDetalle: buscarDetalle 
        
    }); 

    function buscarDetalle(datos) {
        var request = $http({
            method: "post",
            url: baseUrl+"factura/listar_detalle_factura/"+datos
        });
        return( request.then( handleSuccess,handleError ) );
    }

    

    
 
});