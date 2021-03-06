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

    <title>Vidalta | Cotizador</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Main CSS -->
  <link href="css/main.css" rel="stylesheet">
  <!-- sweet-alert CSS -->
  <link href="css/sweet-alert.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

  </head>

  <body class=" container image-container vertical-center"  ng-app="app" id="ng-app">

      <div class=" card col-sm-10 wizard-body" ng-controller="generalCtrl">
         
          <!--      Wizard container        -->   
          <div class="wizard-container ">  
                  <div class=" wizard-card ">

                    <!--   Wizard Header   -->
                    <div class="wizard-header row">
                      
                      <h3 class="col-xs-4 col-sm-5"><b>VIDALTA</b> COTIZADOR</h3>
                      <img src="Img/vidalta.png" class=" col-xs-4 logo pull-right">
                    </div> <!--  END Wizard Header   -->
                    
                    <ul class="nav nav-pills" >
                      <li style="width:<%getSize()%>%;"  ng-repeat="nav in navArray" ng-show="isLogIn($index)" ng-class="{active:isActive($index)}">
                        <a data-toggle="tab">
                          <%nav%>
                        </a>
                      </li>
                    </ul>  

                    <div ng-view></div>

                    <div class="move-btns">
                      <button class="btn btn-move btn-left" ng-click="prev()" ng-show="prevActive()"><i class="fa fa-angle-double-left fa-2x"></i></button>
                      <button class="btn btn-move  btn-right" ng-click="next()" ng-show="nextActive()"><i class="fa fa-angle-double-right fa-2x"></i></button>
                    </div>
                   
    
                  </div>
          </div> <!-- wizard container -->

      </div>

     


  <!--   JQuery   -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <!--   Angular js   -->
  <script src="/js/angular.min.js"></script>
  <!--   Angular js Route   -->
  <script src="/js/angular-route.min.js"></script>
  <!-- sweet-alert js -->
  <script src="/js/sweet-alert.min.js"></script>
  <!-- sweet-alert js -->
  <script src="/js/SweetAlert.min.js"></script>
  <!--   Log In js    -->
  <script src="/js/app.js"></script>  

  </body>

  
</html>
