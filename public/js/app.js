var app = angular.module('app', ['ngRoute','oitozero.ngSweetAlert']);

var modelos = [
    "A","A Izquierda","B","B Izquierda","B2","C","D","D Izquierda","D Penthouse","E","E Penthouse","F","F Penthouse","G"
];

// var deptos_url = 'http://localhost:8000/api/v1/lista';
// var login_url = 'http://localhost:8000/api/v2/acceso';
var deptos_url = 'json/deptos.json';
var login_url = 'json/demo.json';
var post_url = 'json/deptos.json';

 /**********************************************************************************************************
 Config APP
**********************************************************************************************************/


var navArray = ['Inicio de Secion','Intro','Base','Acabados','Adicionales','Arquitectos','Resumen','Enviar'];

app.config(
        function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


app.config(
    function($routeProvider) {
        
    $routeProvider.
        when('/', {
            templateUrl: 'templates/login-template.html',
            controller: 'logInCtrl',
            controllerAs: 'log'
        }).
        when('/1', {
            templateUrl: 'templates/info-template.html'
        }).
        when('/2', {
            templateUrl: 'templates/base-template.html',
            controller: 'baseCtrl',
            controllerAs: 'base'
        }).
        when('/3', {
            templateUrl: 'templates/acabados-template.html',
            controller: 'acabadosCtrl',
            controllerAs: 'sectionCtrl'
        }).
        when('/4', {
            templateUrl: 'templates/adicionales-template.html',
            controller: 'addCtrl',
            controllerAs: 'sectionCtrl'
        }).
        when('/5', {
            templateUrl: 'templates/arq-template.html',
            controller: 'arqCtrl',
            controllerAs: 'billForm'
        }).
        when('/6', {
            templateUrl: 'templates/resumen-template.html',
            controller: 'billCtrl',
            controllerAs: 'billForm'
        }).
        when('/7', {
            templateUrl: 'templates/send-template.html',
            controller: 'sendCtrl'
        }).
        otherwise({
            redirectTo: function (routeParams, path, search) {
                // console.log(routeParams);
                // console.log(path);
                // console.log(search);
                location.reload();
                return "/";
              }
        });
    }
);

app.run(function(navService) {
    if (navService.count == 0) {
        location.href = '#/';
        navService.count = 0;
    };
});

 /**********************************************************************************************************
 navService
**********************************************************************************************************/

app.service('navService', function() {

    this.title = "VIDALTA";

    this.navArray = navArray;
    this.count = 0;
    this.subCount = {};
    this.subCount.count = 0;
    this.subCount.max = 0;
    this.subCount.active = false;
    

    this.isLogIn = function(index){
        if (this.count == 0 && index == 0) {
            return true;
        }else{
            if (this.count != 0 && index != 0) {
                return true;
            }else{
                return false;
            };
        };
    };   

    this.prevActive = function(){
        var active = (this.count > 1)? true: false ;
        return active;
    };   

    this.nextActive = function(){
        var active = (this.count > 0 && this.count < this.navArray.length-1 )? true: false ;
        return active;
    };   

    this.isActive = function(index){
        var active = (index == this.count) ? true: false ;
        return active;
    }; 

    this.next = function(){
        if(this.count <= this.navArray.length-1){
            if (this.subCount.active && this.subCount.count < this.subCount.max-1) {
                this.subCount.count += 1;
            }else{
                this.count += 1;
                location.href = '#/' + this.count;
                this.subCount.count = 0;
                this.subCount.max = 0;
                this.subCount.active = false;
            };
        };
    }; 

    this.prev = function(){
        if(this.count > 1){
            if (this.subCount.active && this.subCount.count > 0) {
                this.subCount.count -= 1;
            }else{
                this.count -= 1;
                location.href = '#/' + this.count;
                this.subCount.count = 0;
                this.subCount.max = 0;
                this.subCount.active = false;
            };
        };
    }; 

});

/**********************************************************************************************************
 billService
**********************************************************************************************************/

app.service('billService', function(secciontFactory) {

    this.userEmail = "";
    this.deptoModel = "";
    this.deptoNumber = 0;

    this.billArray = [];
    this.billAcabados = [];
    this.billAditional = [];
    this.taxesArray = [];
    this.taxesActive = false;
    this.arqSelect = [];

    this.baseArray = [];
    this.acabadosArray = [];
    this.adicionalesArray = [];

    this.baseArray.active = false;
    this.acabadosArray.active = false;
    this.adicionalesArray.active = false;

    this.subTotalBill = 0;
    this.subTotalAditional = 0;
    this.totalBill = 0;
    this.iva = 0;
    this.afterTax = 0;

    this.add = function(array, elemento){
        array.push(elemento); 
    };

    this.delate = function(array, elemento){
        var index = array.indexOf(elemento);
        if (index != null) {
            array.splice(index, 1);
        };
    };


    this.calcBill = function(){
        this.calcSubTotal();
        this.getComitions(this.subTotalBill);
        this.calcTotal();
    };

    this.calcSubTotal = function(){
        this.subTotalBill = 0;
        for (var i = this.billArray.length - 1; i >= 0; i--) {
            this.subTotalBill += this.billArray[i].precio;
        };
        for (var i = this.billAcabados.length - 1; i >= 0; i--) {
            this.subTotalBill += this.billAcabados[i].precio;
        };
        for (var i = this.billAditional.length - 1; i >= 0; i--) {
            this.subTotalAditional += this.billAditional[i].precio;
        };
    };


    this.getComitions = function(){
        this.subTotalBill += this.subTotalAditional;
        for (var i = this.taxesArray.length - 1; i >= 0; i--) {
            var tax = this.taxesArray[i].monto/100;
            this.taxesArray[i].taxAplay = this.subTotalBill * tax;
        };
    };

    this.calcTotal = function(){
        this.totalBill = 0;
        for (var i = this.taxesArray.length - 1; i >= 0; i--) {
            this.totalBill += this.taxesArray[i].taxAplay;
        };
        this.totalBill += this.subTotalBill
        this.iva = this.totalBill * 0.16;
        this.afterTax = this.iva + this.totalBill;
    };

});


/**********************************************************************************************************
secciontFactory
**********************************************************************************************************/

//app.factory('secciontFactory',function($http,$httpParamSerializerJQLike){
app.factory('secciontFactory', ['$http', '$httpParamSerializerJQLike', 
    function($http) {

    var JSON_url = login_url;

    // var postSubmit = function post_submit(post_data,callback){
    //     $http({
    //         url: "json/access.json",
    //             method: "GET"
    //             // ,
    //             // data:post_data
    //         }).success(callback);
    // };

    function getData(callback){
          $http({
            method: 'GET',
            url: JSON_url,
            cache: true
          }).success(callback);
    }

    return {
        getModels: function(post_data,callback){
            postSubmit(post_data,function(data) {
                var baseData = data;
                get_JSON = data;
                callback( baseData );
             });
        },
        getS1: function(callback){
            getData(function(data) {
              var baseData = data.predeterminado;
              callback( baseData );
            });
        },
        getS2: function(callback){
            getData(function(data) {
              var baseData = data.escoger;
              callback( baseData );
            });
        },
        getS3: function(callback){
            getData(function(data) {
              var baseData = data.opcional;
              callback( baseData );
            });
        },
        getS4: function(callback){
            getData(function(data) {
              var baseData = data.arquitecto;
              callback( baseData );
            });
        },
        getS5: function(callback){
            getData(function(data) {
              var baseData = data.tax;
              callback( baseData );
            });
        },
        // get all the coments
        get : function(url) {
            return $http.get(url);
        },
        // save a coment (pass in coment data)
        save : function(comentData , url) {
            return $http({
                method: 'GET',
                url: url,
                // data: $.param(commentData)
                params: comentData,
                cache: true
            });
        },
        // destroy a comment
        destroy : function(url , id) {
            return $http.delete(url + id);
        },
                // destroy a comment
        setUrl : function(url) {
            JSON_url = url;
            console.log("url: " + JSON_url);
            return true;
        }
    };
// });
 }]);



 /**********************************************************************************************************
General Controller
**********************************************************************************************************/

app.controller('generalCtrl', function($scope, navService,secciontFactory) {


    navService.navArray = navArray; 
    $scope.navArray = navService.navArray;


    $scope.isLogIn = function(index){
        return navService.isLogIn(index);
    };   

    $scope.isActive = function(index){
        return navService.isActive(index);
    }; 

    $scope.next = function(){
        navService.next();
    }; 

    $scope.prev = function(){
        navService.prev();
    }; 

    $scope.nextActive = function(){
        return navService.nextActive();
    };

    $scope.prevActive = function(){
        return navService.prevActive();
    };   

    $scope.getSize = function(){
        var size = 100;
        if (navService.count != 0) {
            size = 100/($scope.navArray.length -1);
        };
        return size;
    }; 

    $scope.$on('$routeChangeSuccess', function(event, current) {
        if (navService.count == 0) {
            location.href = '#/';
        };
    });

});

/**********************************************************************************************************
 billCtrl
**********************************************************************************************************/


app.controller('billCtrl', function($scope, secciontFactory, billService){

    $scope.bill = billService;
    $scope.billArray = billService.billArray;
    $scope.billAcabados = billService.billAcabados;
    $scope.billAditional = billService.billAditional;
    $scope.arqSelect = billService.arqSelect;
    $scope.hitch;
    $scope.meses;

    secciontFactory.getS5(function(data) {
        if (billService.taxesActive == false) {
            billService.taxesArray = data;

            for (var i = billService.taxesArray.length - 1; i >= 0; i--) {
                billService.taxesArray[i].taxAplay = 0;
            };
            billService.taxesActive = true;
            billService.calcBill();
        };
    });

});

/**********************************************************************************************************
 logInCtrl
**********************************************************************************************************/

app.controller('logInCtrl', function($scope, navService, secciontFactory,SweetAlert) {

    $scope.deptos_url = deptos_url;
    $scope.login_url = login_url;
    $scope.models = [];

    secciontFactory.get( deptos_url )
        .success(function(data) {
            var deptos = data;
            for (var i = 0 ; i < deptos.length; i++) {
                var depto = deptos[i].depto;
                $scope.models.push(depto);
            };
            console.log($scope.models);
        });
    
    $scope.submit = function(valid){ 
        if(valid){
            
            navService.userEmail = this.userEmail;
            navService.deptoModel = this.userModel;
            navService.deptoNumber = this.userDepto;

            var post = {};
            post.modelo = this.userModel;
            post.acceso = this.userPassword;
            console.log(post);

            secciontFactory.save(post, login_url)
                .success(function(data){
                    //console.log(data);

                    if (data != "INVALIDO") {
                       navService.next();
                    }else{
                       SweetAlert.swal("Error","Contraseña no valida","error");
                    }

                    //secciontFactory.get(login_url)
                      //  .success(function(getData) {
                        //    console.log(getData);
                            
                            //if (getData.url != null) {
                              //  secciontFactory.setUrl(getData.url);
                               // navService.next();
                            //}else{
                              //  SweetAlert.swal("Error","Contraseña no valida","error");
                            //}
                      //  });
                })
                .error(function(data) {
                    SweetAlert.swal("Error de conexion","Revise su conexión a internet","error");
                });
        } else{
            SweetAlert.swal("Error","Capo invalido","error");
        }
    }
 
});

/**********************************************************************************************************
 baseCtrl
**********************************************************************************************************/

app.controller('baseCtrl', function($scope, secciontFactory, billService, navService){

    $scope.baseData = billService.baseArray;

    secciontFactory.getS1(function(data) {

        if (billService.baseArray.active == false ){
            billService.baseArray.seccion = "Paquete Base";
            billService.baseArray.elementos = [];

            $scope.rawData = data;

            for(var i in $scope.rawData ){
                var elemento = $scope.rawData[i];
                elemento.disabled = true;
                elemento.checked = true;
                elemento.basePrice = 0;
                elemento.section = "Paquete Base";

                billService.add( billService.billArray , elemento);
                billService.baseArray.elementos.push(elemento);
            }

            billService.calcBill();
            billService.baseArray.active = true;
        };
    });
    
});

/**********************************************************************************************************
 acabadosCtrl
**********************************************************************************************************/
app.controller('acabadosCtrl', function($scope, secciontFactory, billService, navService){
    $scope.sectionsData = billService.acabadosArray;

    secciontFactory.getS2(function(data) {

        if (billService.acabadosArray.active == false){

            $scope.rawData = data;

            for(var i in $scope.rawData ){
                var section = $scope.rawData[i];
                for(var j in section.escogeroptions ){

                    var elemento = section.escogeroptions[j];
                    elemento.checked = (j == 0) ? true : false;
                    elemento.basePrice = (j == 0) ? 0 : ( elemento.precio  - section.escogeroptions[0].precio);
                    elemento.disabled = (elemento.precio >= 0) ? false : true;
                    elemento.section = section.seccion;

                    if (elemento.checked) {
                        billService.add( billService.billAcabados ,elemento);
                    };
                };
                section.selectedItem = 0;
                billService.acabadosArray.push(section);
                billService.acabadosArray.active = true;
            };

            billService.calcBill();
        };

        navService.subCount.count = 0;
        navService.subCount.max = $scope.sectionsData.length;
        navService.subCount.active = true;
    });

    $scope.updateBill = function(section, elemento){

        var oldItem = section.escogeroptions[section.selectedItem];
        var newIndexItem = section.escogeroptions.indexOf(elemento);

        if (oldItem != elemento){

            oldItem.checked = false;

            billService.delate(billService.billAcabados ,oldItem);
            billService.add( billService.billAcabados ,elemento);

            section.selectedItem = newIndexItem;

            billService.calcBill();
        }else{
            elemento.checked = true;
        };

    };

    $scope.sectionActive = function(index){
        var active = (navService.subCount.count == index)? true: false;
        return active;
    }

    $scope.getTabSize = function(){
        var size = 100/(billService.acabadosArray.length);
        return size;
    }; 
    
});

/**********************************************************************************************************
 addCtrl
**********************************************************************************************************/

app.controller('addCtrl', function($scope, secciontFactory, billService,navService){
    $scope.sectionsData = billService.adicionalesArray;

    secciontFactory.getS3(function(data) {


        if (billService.adicionalesArray.active == false){

            $scope.rawData = data;

            for(var i in $scope.rawData ){
                var section = $scope.rawData[i];
                for(var j in section.opcionaloptions ){

                    var elemento = section.opcionaloptions[j];
                    elemento.checked =  false;
                    elemento.disabled = false;
                    elemento.basePrice = elemento.precio;
                    elemento.section = section.seccion;

                };
                section.selectedItem = -1;
                billService.adicionalesArray.push(section);
            };

            billService.calcBill();
            billService.adicionalesArray.active = true;

           

        };

        navService.subCount.count = 0;
        navService.subCount.max = $scope.sectionsData.length;
        navService.subCount.active = true;
    });

    $scope.updateBill = function(section, elemento){

        var newIndexItem = section.opcionaloptions.indexOf(elemento);

        if (newIndexItem == section.selectedItem) {
            var oldItem = section.opcionaloptions[section.selectedItem];
            oldItem.checked = false;
            billService.delate(billAditional ,oldItem);
            section.selectedItem = -1;
        } 
        else{
            if (elemento.checked && section.selectedItem != -1) {
                var oldItem = section.opcionaloptions[section.selectedItem];
                oldItem.checked = false;
                billService.delate(billAditional ,oldItem);
            };
            if (elemento.checked) {
                billService.add( billService.billAditional, elemento);
                section.selectedItem = newIndexItem;
            };
        };
        billService.calcBill();

    };

    $scope.sectionActive = function(index){
        var active = (navService.subCount.count == index)? true: false;
        return active;
    }

     $scope.getTabSize = function(){
        var size = 100/(billService.adicionalesArray.length);
        return size;
    }; 
    
});

/**********************************************************************************************************
 arqCtrl
**********************************************************************************************************/
app.controller('arqCtrl', function($scope, secciontFactory, billService){
    $scope.sectionsData = [];

    secciontFactory.getS4(function(data) {
        $scope.rawData = data;

        for(var i in $scope.rawData ){
            var elemento = $scope.rawData[i];
        
            elemento.checked =  false;
            elemento.disabled = false;
            
            $scope.sectionsData.push(elemento);
        };
    });

    $scope.arqUpdate = function(elemento){
        if (elemento.checked){
            billService.add(billService.arqSelect,elemento);
        } else{
            billService.delate(billService.arqSelect,elemento);
        };
    };
    
});

/**********************************************************************************************************
 arqCtrl
**********************************************************************************************************/
app.controller('sendCtrl', function($scope,SweetAlert,navService, billService, secciontFactory){


    // secciontFactory.getS4(function(data) {
    //     $scope.rawData = data;

    //     for(var i in $scope.rawData ){
    //         var elemento = $scope.rawData[i];
        
    //         elemento.checked =  false;
    //         elemento.disabled = false;
            
    //         $scope.sectionsData.push(elemento);
    //     };
    // });

    $scope.sendMail = function(){

            // this.userEmail = "";
            // this.deptoModel = "";
            // this.deptoNumber = 0;

            // this.billArray = [];
            // this.billAditional = [];
            // this.taxesArray = [];
            // this.taxesActive = false;
            // this.arqSelect = [];

            // this.baseArray = [];
            // this.acabadosArray = [];
            // this.adicionalesArray = [];

            // this.baseArray.active = false;
            // this.acabadosArray.active = false;
            // this.adicionalesArray.active = false;

            // this.subTotalBill = 0;
            // this.subTotalAditional = 0;
            // this.totalBill = 0;
            // this.iva = 0;
            // this.afterTax = 0;


        var post = {};

        post.modelo = billService.deptoModel ;
        post.numero = billService.deptoNumber ;
        post.correo = billService.userEmail ;
        // post.default = billService. ;
        // post.escoger = billService. ;
        // post.opcionales = billService. ;
        // post.tax = {};
        //post.tax.subTotal = {};
        //post.tax.iva = {};
        //post.tax.total = {};
        //post.tax.enganche = {};
        //post.tax.aEnganche = {};
        //post.tax.meses = {};
        //post.tax.pMeses = {};


        secciontFactory.save(post, post_url)
                .success(function(data){
                    //console.log(data);

                    SweetAlert.swal({
                       title: "Enviado a: "+ navService.userEmail,
                       text: "La cotizacion se envio con exito. ¿Desae cerrar terminar?",
                       type: "success",
                       showCancelButton: true,
                       confirmButtonColor: "#FF9500",
                       confirmButtonText: "Terminar",
                        cancelButtonColor: "#f3f3f3",
                       cancelButtonText: "Continuar",
                       closeOnConfirm: false}, 
                    function(){ 
                       SweetAlert.swal("Booyah!");
                    });

                })
                .error(function(data) {
                    SweetAlert.swal("Error de conexion","Revise su conexión a internet","error");
                });

        


    };
    
});

/**********************************************************************************************************
 priceFilter
**********************************************************************************************************/
app.filter("priceFilter", function() {
    return function(input) {
        if (input > 0){
            return "+ $"+input;
        };
        if (input == 0){
            return "Incluido";
        };
        if (input < 0){
            return "Consulte al Probedor";
        };
    };
});