@extends ('admin')


@section ('arquitecto')


 <!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Arquitectos
          </h1>
          <ol class="breadcrumb">
            <button onclick="location.href='/admin/arquitecto/create';" class="btn btn-sm pull-right" ><i class="fa fa-plus-circle"></i> Agregar</button>
          </ol>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">
          <div class="row">

            @foreach($arquitectos as $arquitecto)
            <!-- Arquitecto -->
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
            
            @endforeach


          </div><!-- /.row -->
        </section><!-- Contenido a Modificar -->
@stop
