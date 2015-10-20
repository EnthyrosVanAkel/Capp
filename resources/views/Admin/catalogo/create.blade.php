
@extends ('admin')


@section ('catalogo')


<!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Catalogos Departamentos
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">
          <div class="row">

            <!-- Formulario Nuevo de Partamento -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevo departamento</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!! Form::open(['url' => 'admin/catalogo']) !!}
                  <div class="box-body">

                    <div class="form-group col-xs-8 col-xs-offset-2">
                      {!! Form::label('modelo','Modelo: ') !!}
                      {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo']) !!}

                      {!! Form::label('acceso','Acceso: ') !!}
                      {!! Form::text('acceso',null,['class'=>'form-control','placeholder'=>'Password de acceso']) !!}

                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {!! Form::submit('Añadir',['class'=>'btn btn-primary']) !!}
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
