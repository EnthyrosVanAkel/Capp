
@extends('admin')

@section('escoger')

<!-- Nombre de la Seccion -->
        <section class="content-header">
          <h1>
            Catalogo departamento <b>{{$id_catalogo}}</b>
          </h1>
        </section> <!-- END Nombre de la Seccion -->
        
        <!-- Contenido a Modificar -->
        <section class="content">

          <div class="row">


            <!-- Formulario Nuevo de Partamento -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Modificar Escoger</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                 {!! Form::model($opcion,['method' => 'PATCH','files' => 'true','action'=>['EscogerOptionsController@update',$id_catalogo,$id_escoger,$opcion->id]]) !!}
                  
                  <div class="box-body">

                    <div class="col-xs-8 col-xs-offset-2">
                     
                        <h3>Opcion {{$opcion->nombre}}</h3>

                        {!! Form::label('nombre1','Nombre: ') !!}
                        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion1','Descripcion: ') !!}
                        {!! Form::textarea('descripcion',null,['class'=>'form-control','row'=>'3','placeholder'=>'Descripcion....']) !!}

                        {!! Form::label('precio','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio']) !!}

                        </div>
                              
                        {!! Form::label('proveedor1','Proveedor: ') !!}
                        {!! Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}

                                  
                        {!! Form::label('url_img1','Imagen: ') !!}
                        {!! form::file('imagen',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                        
                     

                      
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {!! Form::submit('Modificar',['class'=>'btn btn-primary']) !!}
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