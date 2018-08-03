
angularRoutingApp.controller('facturaController', function( DTOptionsBuilder, DTColumnBuilder, DTInstances,$compile,$scope,$filter,$modal,blockUI,$timeout,
	juridicoServices,articuloServices,facturaServices,ConfiguracionDocumentoServices) {
	
	$scope.$parent.titulo = 'FACTURA';
	$scope.$parent.subtitulo = 'gestion de factura';
     $scope.estadoCarrito=true;
 




     var f = new Date();
       var dia=f.getFullYear()+"-" + (f.getMonth() +1) + "-" + f.getDate();

	 $scope.renderTable = function () {
             
        var pUrl = baseUrl+"factura/listar_facturas"; 

        $scope.dtlistaFacturas = DTOptionsBuilder.fromSource(pUrl)
            //.withScroller()
            .withPaginationType('full_numbers')
            .withOption('deferRender',true) 
            .withOption('scrollY',250)
            .withOption('createdRow', createdRow);


        $scope.listaFacturas = {
            dtOptions : $scope.dtlistaFacturas,
            dtColumns : [
                DTColumnBuilder.newColumn('cod_doc').withTitle('DOCUMENTO'),
                DTColumnBuilder.newColumn('cod_cliente').withTitle('CODIGO_CLIENTE'),
                DTColumnBuilder.newColumn('ape_pat').withTitle('PATERNO'),
                DTColumnBuilder.newColumn('ape_mat').withTitle('MATERNO'),
                DTColumnBuilder.newColumn('nombres').withTitle('NOMBRE'),
                DTColumnBuilder.newColumn('ruc_taller').withTitle('RUC'),
                DTColumnBuilder.newColumn('fecha').withTitle('FECHA'),
                DTColumnBuilder.newColumn('total').withTitle('TOTAL')
                 
                

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
   $scope.popUpFormFactura = function (accion,cliente_id) {
        
         

        if( accion == 'edit' ){
    
        }else if( accion == 'reg' ){
            
            $scope.titleModal = 'Registro de factura';
             
                // $http.get(baseUrl+"factura/ver_popup_factura").then(function(data) {
                        // inform.add('Data received from server');

            $scope.guardarFactura = function () { 

                 
                facturaServices.registrarFactura($scope.fFactura).then(function( rpta ) {
                         

                        blockUI.start("Insertando...");  
                        $timeout(function() { 
                        blockUI.stop(); 
                            }, 500); 

                        
                        $scope.fFactura.documento=rpta[0].numfinal;
                        console.log($scope.fFactura.documento);


                        myModalDetalle.dismiss('cancel');
                          
                        $scope.dtInstanceFactura.reloadData();

                });
            }

 
            
        };
        
        myModalDetalle = $modal.open({
            templateUrl: baseUrl+'factura/ver_popup_factura',
            scope: $scope,
            size: 'lg'
        });

        $scope.cancel = function () {
            myModalDetalle.dismiss('cancel');


        };

        myModalDetalle.opened.then(function () {
            $scope.fFactura = {};
            $scope.fArticulo = {};
            $scope.fCliente = {};
            // $scope.fFactura.fecha=$filter('date')(new Date(),'yyyy-MM-dd');
            $scope.fFactura.arrDetalle=[];
            $scope.listarClienteJuridico();
            $scope.fFactura.subtotal=0.00;
            $scope.fFactura.total=0;
            $scope.fFactura.igv=0.00;
            $scope.showLabelDescuento=false;
            $scope.showBotonAddDescuento=true;


            $scope.fFactura.fecha = dia;
            // $scope.fFactura.documento=$('#ndoc').val();
            $scope.fFactura.user= $('#user').val();

                          // });
             facturaServices.traerNumeroDocumento().then(function(rpta){
            console.log(rpta[0]['cod_doc']);
            console.log('dentro');
            $scope.fFactura.documento = rpta[0]['cod_doc'];
                });
           
           ConfiguracionDocumentoServices.listarconfiguracion().then(function(rpta){
                console.log(rpta);
                $scope.igv=rpta[0]['valor'];
                $scope.descuento=rpta[1]['valor'];

           });
        });

    }


        

    

    $scope.traerClienteDatos = function(){
         juridicoServices.listarjuridicoxRuc($scope.fFactura.juridicoId).then(function(rpta){
           $scope.fCliente.nombres = rpta[0].nombres+" "+rpta[0].ape_pat+" "+rpta[0].ape_mat;
           $scope.fFactura.codcliente = rpta[0].cod_cliente;
           $scope.fFactura.ruc = rpta[0].ruc;
           $scope.fCliente.direccion = rpta[0].direccion;
           $scope.fCliente.telefono = rpta[0].telefono;
           $scope.fCliente.correo = rpta[0].correo;
        });
    }

    $scope.listarClienteJuridico = function(){
        juridicoServices.listarjuridicocbo().then(function(rpta){
            $scope.listaJuridico = rpta.juridicos;
            $scope.listaJuridico.splice(0,0,{id:'',descripcion:'--Seleccione Cliente--'});
            $scope.juridicoId=$scope.listaJuridico[0].id;
        });

    }

    $scope.addArticulo = function (){
        console.log('agregar');
            $scope.fFactura.user= $('#user').val();
            
         
           $scope.fFactura.arrDetalle.push({
                            cantidad : $scope.fArticulo.cantidad, 
                            idart: $scope.fArticulo.articuloId,
                            concepto: $scope.fArticulo.concepto, 
                            precio:parseFloat($scope.fArticulo.precio).toFixed(2),
                            total: parseFloat($scope.fArticulo.total).toFixed(2)
                            
           });

         
        
       
       $scope.fFactura.subtotal=$scope.fFactura.subtotal+   parseFloat($scope.fArticulo.total);          
        
       $scope.igvDefinido=$scope.igv;

       $scope.fFactura.igv= $scope.fFactura.subtotal*parseFloat($scope.igvDefinido);
       $scope.fFactura.igv= $scope.fFactura.igv.toFixed(2);

       $scope.fFactura.total= parseFloat($scope.fFactura.subtotal) + parseFloat($scope.fFactura.igv);
      
  
            
            $scope.estadoAgregar=true;
            $scope.estadoCarrito=false;
            
            $scope.fFactura.pc =$('#pcnom').val();
             $scope.fArticulo = {};
        }

        $scope.quitarLinea= function(index){


           
            $scope.igvDefinido=$scope.igv;

            $scope.fFactura.subtotal=$scope.fFactura.subtotal-$scope.fFactura.arrDetalle[index].total;          
            $scope.fFactura.igv= $scope.fFactura.subtotal*parseFloat($scope.igvDefinido);
            $scope.fFactura.igv= $scope.fFactura.igv.toFixed(2);
            $scope.fFactura.total= $scope.fFactura.subtotal-$scope.fFactura.igv;
      

            $scope.fFactura.arrDetalle.splice(index,1);


        }
$scope.estadoAdd="true";
        $scope.traerDatosArticulo=function(){
            console.log('blur');
            
              articuloServices.listararticulos($scope.fArticulo.articuloId).then(function(rpta){

             // if($scope.fArticulo.articuloId!=''){
             //     $scope.estadoAgregar=false;
             // }

             // else{ $scope.estadoAgregar=true;}

               if($scope.estadoAdd!="false"){
                $scope.fArticulo.cantidad=1.00;
                $scope.fArticulo.concepto=rpta[0].nombre+' : '+rpta[0].descripcion;
                $scope.fArticulo.precio=rpta[0].pre_unit;
                console.log(rpta[0].nombre);
                // console.log('precio'+ parseFloat($scope.fArticulo.precio).toFixed(2));
                // $scope.fArticulo.stock=rpta.stock;
                $scope.fArticulo.total=$scope.fArticulo.cantidad*parseFloat($scope.fArticulo.precio).toFixed(2);
                $scope.fArticulo.total=$scope.fArticulo.total.toFixed(2);
                  }

               

            });
        } 

        $scope.traerTotal = function(){
            $scope.fArticulo.total=$scope.fArticulo.cantidad*$scope.fArticulo.precio;
            $scope.fArticulo.total=$scope.fArticulo.total.toFixed(2);
             
        }  

        $scope.prueba = function(){
            console.log($scope.fFactura.fecha+"fecha");
        }

        $scope.addDescuento = function(){
            // $scope.desc=$('#descuento').val();
            $scope.desc=$scope.descuento;
            $scope.fFactura.total = $scope.fFactura.total-parseFloat($scope.desc);
            $scope.showLabelDescuento=true;
            $scope.showBotonAddDescuento=false;
        }

        // $scope.changeInput = function(index){
         

            
        //     $scope.linea_total_anterior=$scope.fCompras.arrDetalle[index].total; //Total linea ANTERIOR
        //     $scope.fFactura.arrDetalle[index].total=$scope.fFactura.arrDetalle[index].cantidad*parseFloat($scope.fFactura.arrDetalle[index].precio).toFixed(2);
    
    
        //     console.log($scope.fFactura.arrDetalle[index].precio+'precioooo');
        //     console.log($scope.fFactura.arrDetalle[index].cantidad+'cant');

        //     $scope.fFactura.arrDetalle[index].total=$scope.fFactura.arrDetalle[index].total.toFixed(2);
        //     console.log($scope.stockfijo+' fijo ');
               
        //     // $scope.fFactura.arrDetalle[index].stock=parseFloat($scope.stockfijo)+parseFloat($scope.fFactura.arrDetalle[index].cantidad);
            
        //     $scope.fFactura.total=$scope.fFactura.Subtotal+parseFloat($scope.fFactura.arrDetalle[index].total)-parseFloat($scope.linea_total_anterior);
        //     $scope.fFactura.total=$scope.fFactura.total* $scope.fFactura.igv;
        //     $scope.fFactura.total=$scope.fFactura.total.toFixed(2);
            


        // }

});

angularRoutingApp.service("facturaServices",function( $http, $q ) {
    return({
        registrarFactura: registrarFactura,
        traerNumeroDocumento:traerNumeroDocumento
        
        
    }); 
    
     function registrarFactura (datos) {

        var jsonDatos = angular.toJson(datos);
        var request = $http({
            method: "post",
            url: baseUrl+"factura/registrar_factura",
            data: jsonDatos,
            headers: { 'Content-Type': 'application/json' }
        });
        return( request.then( handleSuccess,handleError ) );
    }

     function traerNumeroDocumento(){
        var request = $http({
            method: "post",
            url: baseUrl+"factura/traer_numero_documento" 
        });
        return( request.then( handleSuccess,handleError ) );

    }

   

});
