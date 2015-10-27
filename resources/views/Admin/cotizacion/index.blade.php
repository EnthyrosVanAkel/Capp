@extends ('admin')

@section ('cotizacion')

        <!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Cotizaciones
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 ">
              <div class="box box-success">
                <div class="box-body">

                  <!-- Tabla -->
                  <table id="table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Departamento</th>
                        <th>Correo Electronico</th>
                        <th>Fecha</th>
                        <th>Cotización</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@foreach($cotizaciones as $cotizacion)
                      <tr>
                        <td>{{$cotizacion->id}}</td>
                        <td>{{$cotizacion->modelo}}</td>
                        <td>{{$cotizacion->departamento}}</td>
                        <td>{{$cotizacion->email}}</td>
                        <td>{{$cotizacion->created_at}}</td>
                        <td>
                          <a href="/admin/cotizaciones/{{$cotizacion->id}}">PDF</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Departamento</th>
                        <th>Correo Electronico</th>
                        <th>Fecha</th>
                        <th>Cotización</th>
                      </tr>
                    </tfoot>
                  </table><!-- End Tabla -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- Contenido a Modificar -->

      </div><!-- End Contenedor -->

      @stop



      @section('js')
         <script>
      $(function () {
        $("#table").DataTable();
      });
    </script>

    @stop