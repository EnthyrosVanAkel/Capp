@extends ('admin')


@section ('catalogo')

<!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Catalogo <b>{{$catalogo->modelo}}</b>
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">

          <div class="row">
            <!-- Tabla de predeterminados -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Predeterminados</h3>
                  <div class="box-tools">
                    <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/p/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>Precio</th>
                        <th>Provedor</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($catalogo->predeterminado as $predeterminado)
                      <tr>
                        <td>{{$predeterminado->id}}</td>
                        <td>{{$predeterminado->nombre}}</td>
                        <td>{{$predeterminado->precio}}</td>
                        <td>{{$predeterminado->proveedor}}</td>
                        <td>
                          {!! Form::open(['method'  => 'DELETE','action' =>['PredeterminadoController@destroy',$catalogo->id,$predeterminado->id]]) !!}
                        {!! Form::submit('X',['class'=>'btn btn-sm']) !!}
                        {!! Form::close() !!}
                        <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/p/{{$predeterminado->id}}/edit';" class="btn btn-sm" ><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de predeterminados -->


            <!-- Tabla de elegir  -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Acabados</h3>
                   <div class="box-tools">
                    <button onclick="location.href='departamentos-2-2.html';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre Seccion</th>
                        <th>Opcion A</th>
                        <th>Opcion B</th>
                        <th>Opcion C</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($catalogo->escoger as $escoger)
                      <tr>
                        <td>{{$escoger->id}}</td>
                        <td>
                          <button class="btn btn-sm" onclick="location.href='departamentos-2-3.html';" >{{$escoger->seccion}}</button>
                        </td>
                        @foreach($escoger->escogeroptions as $opcion)
                        <td>{{$opcion->nombre}}</td>
                        @endforeach
                        <td>
                          <button class="btn btn-sm" ><i class="fa fa-times"></i></button>
                          <button class="btn btn-sm" ><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de elegir  -->

   
            <!-- Tabla de Opcionales  -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Opcionales</h3>
                   <div class="box-tools">
                    <button onclick="location.href='#';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre Seccion</th>
                        <th>Opcion A</th>
                        <th>Opcion B</th>
                        <th>Opcion C</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($catalogo->opcional as $opcional)
                      <tr>
                        <td>{{$opcional->id}}</td>
                        <td>
                          <button class="btn btn-sm" onclick="location.href='departamentos-2-3.html';" >{{$opcional->seccion}}</button>
                        </td>
                        @if (count($opcional->opcionaloptions) === 3)
                        	@foreach($opcional->opcionaloptions as $opcion)
                        		<td>{{$opcion->nombre}}</td>
                       		@endforeach
                        @elseif (count($opcional->opcionaloptions) === 2)
                        	@foreach($opcional->opcionaloptions as $opcion)
                        		<td>{{$opcion->nombre}}</td>
                       		@endforeach
                       		<td> </td>
                        @elseif (count($opcional->opcionaloptions) === 1)
                        	<td>{{$opcion->nombre}}</td>
                        	<td> </td>
                        	<td> </td>
                        @elseif (count($opcional->opcionaloptions) === 0)
                        	<td> </td>
                        	<td> </td>
                        	<td> </td>
                        @endif
                        <td>
                          <button class="btn btn-sm" ><i class="fa fa-times"></i></button>
                          <button class="btn btn-sm" ><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de elegir  -->


<!-- Tabla Comiciones e Impuestos  -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Impuestos y Comisiones</h3>
                   <div class="box-tools">
                    <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/t/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  
                  <table id="taxes-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Comisión</th>
                        <th>%</th>
                        <th>Edicion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($catalogo->tax as $tax)
                      <tr>
                        <td>{{$tax->id}}</td>
                        <td>{{$tax->concepto}}</td>
                        <td>{{$tax->monto}}</td>
                        <td>
                        {!! Form::open(['method'  => 'DELETE','action' =>['TaxController@destroy',$catalogo->id,$tax->id]]) !!}
                        {!! Form::submit('X',['class'=>'btn btn-sm']) !!}
                        {!! Form::close() !!}
                        <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/t/{{$tax->id}}/edit';" class="btn btn-sm" ><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de elegir  -->


           <!-- Tabla Comiciones e Arquitectos  -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Arquitectos</h3>
                   <div class="box-tools">
                    <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/a/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body row">

                  @foreach($catalogo->arquitecto as $arquitecto)
                  <!-- Arquitecto 1 -->
                  <div class="col-md-4">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="box box-primary direct-chat direct-chat-primary">
                      <div class="box-header with-border">
                        <h5>Arquitecto</h5>
                        <div class="box-tools pull-right">
                   {!! Form::open(['method'  => 'DELETE','action' =>['ArquitectoController@destroy',$catalogo->id,$arquitecto->id]]) !!}
                   {!! Form::submit('X',['class'=>'btn btn-box-tool']) !!}
                   {!! Form::close() !!}
                <button onclick="location.href='/admin/catalogo/{{$catalogo->id}}/a/{{$arquitecto->id}}/edit';" class="btn btn-box-tool" ><i class="fa fa-pencil-square-o"></i></button>   
                  </div>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <img class="profile-user-img img-responsive img-circle" src="/imgs/{{$arquitecto->url_img}}" alt="{{$arquitecto->nombre}}">
                        <h3 class="profile-username text-center">{{$arquitecto->nombre}}</h3>                  
                      </div><!-- /.box-body -->
                      <div class="box-footer text-justify">
                        <p>
                          {{$arquitecto->descripcion}}
                        </p>
                      </div><!-- /.box-footer-->
                    </div><!--/.direct-chat -->
                  </div><!-- /.col -->
                  @endforeach
            
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de elegir  -->





@stop
