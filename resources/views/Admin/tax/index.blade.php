@extends ('admin')


@section ('tax')


        <section class="content-header">
          <h1>
            Impuestos y Comisiones
          </h1>
          <ol class="breadcrumb">
            <button onclick="location.href='/admin/tax/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
          </ol>
        </section>

        <!-- Contenidos -->
        <section class="content">
          <div class="row">

            <!-- Tabla de taxes -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Comisiones</h3>
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
                      @foreach($taxes as $tax)
                      <tr>
                        <td>{{$tax->id}}</td>
                        <td>{{$tax->concepto}}</td>
                        <td>{{$tax->monto}}</td>
                        <td>
                        {!! Form::open(['method'  => 'DELETE','route' =>['admin.tax.destroy',$tax->id]]) !!}
                        {!! Form::submit('X',['class'=>'btn btn-sm']) !!}
                        {!! Form::close() !!}
                        <button onclick="location.href='/admin/tax/{{$tax->id}}/edit';" class="btn btn-sm" ><i class="fa fa-pencil-square-o"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

          </div> 



           <!-- Tabla Comiciones e Arquitectos  -->
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Arquitectos</h3>
                   <div class="box-tools">
                    <button onclick="location.href='/admin/arquitecto/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body row">

                  @foreach($arquitectos as $arquitecto)
                  <!-- Arquitecto 1 -->
                  <div class="col-md-4">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="box box-primary direct-chat direct-chat-primary">
                      <div class="box-header with-border">
                        <h5>Arquitecto</h5>
                        <div class="box-tools pull-right">
                   {!! Form::open(['method'  => 'DELETE','route' =>['admin.arquitecto.destroy',$arquitecto->id]]) !!}
                   {!! Form::submit('X',['class'=>'btn btn-box-tool']) !!}
                   {!! Form::close() !!}
                <button onclick="location.href='/admin/arquitecto/{{$arquitecto->id}}/edit';" class="btn btn-box-tool" ><i class="fa fa-pencil-square-o"></i></button>   
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

            
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- End Tabla de elegir  -->
        </section>  <!-- End Contenidos -->
@stop

