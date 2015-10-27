
@extends('admin')

@section('opcional')

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
                  <h3 class="box-title">Nuevo Opcional</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!! Form::open(['method'  => 'POST','action' =>['OpcionalController@store',$id_catalogo],'files' => 'true']) !!}
                  <div class="box-body">

                    <div class="form-group col-xs-12">

                      {!! Form::label('seccion','Sección: ') !!}
                        {!! Form::text('seccion',null,['class'=>'form-control','placeholder'=>'Nombre de la Sección']) !!}

                      <div class="col-xs-4">
                        <h3>Opcion A</h3>

                        {!! Form::label('nombre','Nombre: ') !!}
                        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion','Descripcion: ') !!}
                        {!! Form::textarea('descripcion',null,['class'=>'form-control','row'=>'3','placeholder'=>'Descripcion....']) !!}

                        {!! Form::label('precio','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio']) !!}

                        </div>
                              
                        {!! Form::label('proveedor','Proveedor: ') !!}
                        {!! Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}

                                  
                        {!! Form::label('url_img','Imagen: ') !!}
                        {!! form::file('imagen',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                        
                      </div>

                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {!! Form::submit('Añadir',['class'=>'btn btn-primary']) !!}
                  </div>
                  
                {!! Form::close() !!} <!-- End Form -->
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