
@extends ('admin')


@section ('arquitecto')

        <!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Catalogo departamento <b>A</b>
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">

          <div class="row">


            <!-- Formulario Nuevo de Partamento -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Modificar</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!! Form::model($arquitecto,['method' => 'PATCH','files' => 'true','action'=>['ArquitectoController@update',$id_catalogo,$arquitecto->id]]) !!}
                  <div class="box-body">

                    <div class="form-group col-xs-12">


                      <div class="col-xs-8 col-xs-offset-2">
                        <h3>{{$arquitecto->id}}</h3>

                        {!! Form::label('nombre','Nombre: ') !!}
                        {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                        {!! Form::label('descripcion','Descripcion: ') !!}
                        {!! Form::textarea('descripcion',null,['class'=>'form-control']) !!}

                        {!! Form::label('url_img','Imagen: ') !!}
                        {!! form::file('imagen',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                      </div>

                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   {!! Form::submit('Modificar',['class'=>'btn btn-primary']) !!}
                  </div>
                  
               {!! Form::close() !!}

@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif

              </div><!-- /.box -->
            </div> <!-- End Formulario Nuevo de Partamento -->
          </div><!-- /.row -->

        </section><!-- Contenido a Modificar -->


@stop
