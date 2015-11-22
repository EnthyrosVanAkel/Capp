
@extends ('admin')


@section ('predeterminado')


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
                  <h3 class="box-title">Nuevo Predeterminado</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!! Form::open(['method'  => 'POST','action' =>['PredeterminadoController@store',$id_catalogo],'files' => 'true']) !!}
                  <div class="box-body">

                    <div class="form-group col-xs-8 col-xs-offset-2">

                     
                        {!! Form::label('nombre','Nombre: ') !!}
                        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion','Descripcion: ') !!}
                        {!! Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Descripcion....']) !!}

                      
                        {!! Form::label('precio','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio',null,['class'=>'form-control']) !!}
                        </div>
                     
                      
                        {!! Form::label('proveedor','Nombre: ') !!}
                       {!! Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}
                     
                      
                        {!! Form::label('url_img','Imagen: ') !!}
                        {!! form::file('imagen',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                     

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
