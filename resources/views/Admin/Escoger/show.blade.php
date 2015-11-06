@extends ('admin')


@section ('escoger')

<!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Seccion <b>{{$escoger->seccion}}</b>
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">
          <div class="row">

          	@foreach($escoger->escogeroptions as $opcion)
            <!-- Opcion A -->
            <div class="col-md-4">
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h4>Opción <b>{{$opcion->nombre}}</b></h4>
                  <div class="box-tools pull-right">
                <button onclick="location.href='/admin/catalogo/{{$escoger->catalogo_id}}/e/{{$escoger->id}}/o/{{$opcion->id}}/edit';" class="btn btn-box-tool" ><i class="fa fa-pencil-square-o"></i></button>   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <img class="profile-user-img img-responsive img-circle" src="/imgs/{{$opcion->url_img}}" alt="{{$opcion->nombre}}">
                  <h3 class="profile-username text-center">{{$opcion->nombre}}</h3>    
                  <ul class="nav nav-stacked">
                    <li>
                      <a href="">
                        Precio 
                        <span class="pull-right">
                          {{$opcion->precio}}
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        Provedor 
                        <span class="pull-right">
                          {{$opcion->proveedor}}
                        </span>
                      </a>
                    </li>
                  </ul>

                </div><!-- /.box-body -->
                <div class="box-footer text-justify">
                  <p>
                    {{$opcion->descripcion}}
                  </p>
                </div><!-- /.box-footer-->
              </div><!--/.direct-chat -->
            </div><!-- /.col -->
            @endforeach

          </div><!-- /.row -->
        </section><!-- Contenido a Modificar -->

@stop
