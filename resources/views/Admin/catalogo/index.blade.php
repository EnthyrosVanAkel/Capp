@extends ('admin')


@section ('catalogo')

<!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Catalogos Departamentos
          </h1>
          <ol class="breadcrumb">
            <button onclick="location.href='/admin/catalogo/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
          </ol>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">
          <div class="row">

            <!-- Lista de Departamentos -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Departamentos</h3>
                </div><!-- /.box-header -->

                  <!-- Box Body -->
                  <div class="box-body">
                    @foreach($catalogos as $catalogo)
                    <div class="col-lg-3 col-xs-4">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>{{$catalogo->modelo}}</h3>
                          <p>{{$catalogo->acceso}}</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-building-o"></i>
                        </div>
                        <a href="/admin/catalogo/{{$catalogo->id}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div><!-- ./col -->
                    @endforeach
                  </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            </div> <!-- End Lista de Departamentos -->


          </div><!-- /.row -->
        </section><!-- Contenido a Modificar -->
@stop
