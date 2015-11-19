<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cotizacion</title>
 <!--   {{{ Html::style('/cotizador/style.css') }}}-->
<link rel="stylesheet" href="cotizador/style.css" media="all" /> 
  <body>

    <header class="clearfix">
      <div id="logo">
        <img src="cotizador/vidalta.png">
      </div>
      <h1>Cotización</h1>
      <div id="company" class="clearfix">
        <div>Vidalta</div>
        <div>Bosques de Pirules esq. con Av. Stim <br />Lomas del Chamizal<br/>México,D.F.</div>
        <div>11632100</div>
        <div><a href="mailto:ventas@vidalta.com.mx">ventas@vidalta.com.mx</a></div>
      </div>
      <div id="project">
    <div><span>MODELO</span>{{ $modelo }}</div>
        <div><span>N°</span>{{ $numero }}</div>
        <div><span>EMAIL</span> <a href="#">{{ $correo }}</a></div>
        <div><span>FECHA</span>{{ $fecha }}</div>
  
      </div>
    </header>

      <table>
        <thead>
          <tr>
            <th class="seccion">Concepto</th>
            <th class="seccion">Articulo</th>
            <th colspan="2" class="seccion">Costo</th>
          </tr>
        </thead>
        <tbody>
          <!-- Empieza una sub seccion -->
          <tr>
            <th colspan="4">Base</th>
          </tr>
          <tr>
            <td>Baños</td>
            <td>Baño Ceramico</td>
            <td colspan="2" class="right">Incluido</td>
          </tr>
          
            <!-- Empieza una sub seccion -->

          <!-- Empieza una sub seccion -->
          <tr>
            <th colspan="4">Acabados</th>
          </tr>
          <tr>
            <td>Baños</td>
            <td>Baño Ceramico</td>
            <td colspan="2" class="right">Incluido</td>
          </tr>
          
            <!-- Empieza una sub seccion -->

          <!-- Empieza una sub seccion -->
          <tr>
            <th colspan="4">Adicionales</th>
          </tr>
          <tr>
            <td>Baños</td>
            <td>Baño Ceramico</td>
            <td colspan="2" class="right">Incluido</td>
          </tr>

  
            <!-- Empieza una sub seccion -->

          <!-- Empieza una sub seccion -->
          <tr>
            <th colspan="4">Arquitectos</th>
          </tr>
          <tr>
            <td>Baños</td>
            <td>Baño Ceramico</td>
            <td colspan="2" class="right">Incluido</td>
          </tr>

         
            <!-- Empieza una sub seccion -->


          <tr>
            <td colspan="3" class="grand right">Sub Total</td>
            <td class=" grand right">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="3" class="right">IVA 16%</td>
            <td class="right">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="3" class="seccion total right ">TOTAL</td>
            <td class="seccion total right ">$6,500.00</td>
          </tr>
          <tr>
            <td colspan="3" class=" right info">Enganche</td>
            <td class=" right info">-$1,500.00</td>
          </tr>
          <tr>
            <td colspan="3" class="  right info">A pagar en mesualidades</td>
            <td class="  right info">$5,000.00</td>
          </tr>
          <tr>
            <td colspan="3" class="  right info">Mesualidad a 24 meses</td>
            <td class="  right info">$208.83</td>
          </tr>

           <!-- Empieza una sub seccion -->

        </tbody>
      </table>


    <footer>
      <b>Aviso de privacidad y notas, vigencia, etc.</b> 

      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
    </footer>
  </body>
</html>