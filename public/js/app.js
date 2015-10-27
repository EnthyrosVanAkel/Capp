var app = angular.module('app', ['ngRoute']);

var modelos = [
    "A","A Izquierda","B","B Izquierda","B2","C","D","D Izquierda","D Penthouse","E","E Penthouse","F","F Penthouse","G"
];


 /**********************************************************************************************************
 Config APP
**********************************************************************************************************/


var navArray = ['Inicio de Sesión','Intro','Base','Acabados','Adicionales','Arquitectos','Resumen','Enviar'];


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
            templateUrl: 'templates/send-template.html'
        }).
        otherwise({
            redirectTo: '/'
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

    this.subTotalBill = 0;
    this.subTotalAditional = 0;
    this.totalBill = 0;
    this.billArray = [];
    this.aditionalArray = [];
    this.taxesArray = [];
    this.taxesActive = false;
    this.arqSelect = [];

    this.baseArray = [];
    this.acabadosArray = [];
    this.adicionalesArray = [];

    this.baseArray.active = false;
    this.acabadosArray.active = false;
    this.adicionalesArray.active = false;

    this.add = function(elemento){
        this.billArray.push(elemento); 
    };

    this.delate = function(elemento){
        var index = this.billArray .indexOf(elemento);
        if (index != null) {
            this.billArray.splice(index, 1);
        };
    };

    this.addAditional = function(elemento){
        this.aditionalArray.push(elemento); 
    };

    this.delateAditional = function(elemento){
        var index = this.aditionalArray.indexOf(elemento);
        if (index != null) {
            this.aditionalArray.splice(index, 1);
        };
    };

    this.addArq = function(elemento){
        this.arqSelect.push(elemento); 
    };

    this.delateArq = function(elemento){
        var index = this.arqSelect.indexOf(elemento);
        if (index != null) {
            this.arqSelect.splice(index, 1);
        };
    };

    this.calcBill = function(){
        this.calcSubTota();
        this.calcAditional();
        this.getTaxes(this.subTotalBill);
        this.calcTotal();
    };

    this.calcSubTota = function(){
        this.subTotalBill = 0;
        for (var i = this.billArray.length - 1; i >= 0; i--) {
            this.subTotalBill += this.billArray[i].precio;
        };
    };

    this.calcAditional = function(){
        this.subTotalAditional = 0;
        for (var i = this.aditionalArray.length - 1; i >= 0; i--) {
            this.subTotalAditional += this.aditionalArray[i].precio;
        };
    };

    this.getTaxes = function(){
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
        this.totalBill += this.subTotalBill;
    };

});


/**********************************************************************************************************
secciontFactory
**********************************************************************************************************/

app.factory('secciontFactory',function($http){
    var get_JSON = {};

    var postSubmit = function post_submit(post_data,callback){
        $http({
            url: "json/access.json",
                method: "GET"
                // ,
                // data:post_data
            }).success(callback);
    };

    function getData(callback){
          $http({
            method: 'GET',
            url: get_JSON.url,
            cache: true
          }).success(callback);
    }

    return {
        getStatus:function(){
            var result = getAccess();
            return result;
        },
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
        }
    };
});


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
    $scope.aditionalArray = billService.aditionalArray;
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

app.controller('logInCtrl', function($scope, navService, secciontFactory) {
    $scope.user = {};
    $scope.models = modelos;
    
    $scope.getApartmentTipe = function(array){ 
        this.user.apartmentTipe = array.tipe;
        
    }
    
    $scope.getApartmentNumber = function(data){ 
        this.user.apartmentNumber = data;
        
    }
    
    $scope.submit = function(valid){ 
        if(valid){
            $scope.user.modelo = this.userDepto;
            //$scope.user.email= this.userEmail;
            $scope.user.aceso= this.userPassword;

            secciontFactory.getModels($scope.user,function(data) {
                var data_post = data;
                if (data_post.url){
                    navService.next();
                }else{
                    alert(data_post.error);
                }
            });

        } else{
            alert("Error campo no valido");
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

                billService.add(elemento);
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
                        billService.add(elemento);
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

            billService.delate(oldItem);
            billService.add(elemento);
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
            billService.delateAditional(oldItem);
            section.selectedItem = -1;
        } 
        else{
            if (elemento.checked && section.selectedItem != -1) {
                var oldItem = section.opcionaloptions[section.selectedItem];
                oldItem.checked = false;
                billService.delateAditional(oldItem);
            };
            if (elemento.checked) {
                billService.addAditional(elemento);
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
            billService.addArq(elemento);
        } else{
            billService.delateArq(elemento);
        };
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