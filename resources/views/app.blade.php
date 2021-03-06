<!--
************************************************************************
************************************************************************
**                   *********** **** ************                    **
****                 **********        **********                    ***
*****                 ********          ********                    ****
******               Project: Cotizador Vidalta                   ******
*******                  Date: Oct-Nov 2015                      *******
******* ======================================================== *******
******         BackEnd developer: EnthyrosVanAkel in github       ******
*****            FrontEnd developer: miguueelo in github           *****
*******************  ============================== ********************
************************** For: QubitWorks  ****************************
******************************          ********************************
********************************       *********************************
*********************************     **********************************
**********************************   ***********************************
*********************************** ************************************
************************************************************************
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>LogIn Cotizador</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Main CSS -->
  <link href="css/main.css" rel="stylesheet">
  <!-- Style Wizard CSS -->
  <link href="/css/gsdk-base.css" rel="stylesheet" />
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
  <!-- Font Awesome CSS -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

  </head>

  <body class=" container image-container"  ng-app="app">

      <div class="col-sm-10 col-sm-offset-1" ng-controller="generalCtrl">
         
          <!--      Wizard container        -->   
          <div class="wizard-container vertical-80">  
                  <div class="card wizard-card ct-wizard-blue">

                    <!--   Wizard Header   -->
                    <div class="wizard-header">
                      <h3><%title%> <b>COTIZADOR</b></h3>
                    </div> <!--  END Wizard Header   -->
                    <%count%>
                    <ul class="nav nav-pills" >
                      <li class="tab-size" style="width:<%getSize()%>%;"  ng-repeat="nav in navArray" ng-show="isLogIn($index)" ng-class="{active:isActive($index)}">
                        <a href="#/" data-toggle="tab">
                          <%nav%>
                        </a>
                      </li>
                    </ul>  

                    <div class="tab-pane" ng-view></div>

                    <div class="row">
                      <div class=" col-sm-6 text-left " >
                        <button class="btn btn-fill btn-warning btn-wd btn-sm " ng-click="prev()" ng-show="prevActive()">Prev</button>
                      </div>
                      <div class=" col-sm-6 text-right" >
                        <button class="btn btn-fill btn-warning btn-wd btn-sm " ng-click="next()" ng-show="nextActive()">Next</button>
                      </div>
                    </div>
                  </div>
          </div> <!-- wizard container -->

 <!--         <footer class="row vertical-20 text-center" ng-controller="billCtrl as bill">
          <div class="wizard-container bill" ng-show="nextActive()">
             <div class="card wizard-footer ct-wizard-blue">

                      <h4 class=" col-sm-6 text-left"> Total :</h4>
                      <h4 class=" col-sm-6 text-right"><%bill.totalBill | currency%> </h4>

             </div>
          </div>      
        </footer> -->

      </div>

     




  <!--   Angular js   -->
  <script src="/js/angular.min.js"></script>
  <!--   Angular js Route   -->
  <script src="/js/angular-route.min.js"></script>
  <!--   Log In js    -->
  <script src="/js/app.js"></script>  

  </body>

  
</html>
