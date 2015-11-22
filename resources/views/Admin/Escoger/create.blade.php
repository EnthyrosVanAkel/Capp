
@extends('admin')

@section('escoger')

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
                  <h3 class="box-title">Nuevo Escoger</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!! Form::open(['method'  => 'POST','action' =>['EscogerController@store',$id_catalogo],'files' => 'true']) !!}
                  <div class="box-body">

                    <div class="form-group col-xs-12">

                      {!! Form::label('seccion','Sección: ') !!}
                        {!! Form::text('seccion',null,['class'=>'form-control','placeholder'=>'Nombre de la Sección']) !!}

                      <div class="col-xs-4">
                        <h3>Opcion A</h3>

                        {!! Form::label('nombre1','Nombre: ') !!}
                        {!! Form::text('nombre1',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion1','Descripcion: ') !!}
                        {!! Form::textarea('descripcion1',null,['class'=>'form-control','row'=>'3','placeholder'=>'Descripcion....']) !!}

                        {!! Form::label('precio1','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio1',null,['class'=>'form-control','placeholder'=>'Precio']) !!}

                        </div>
                              
                        {!! Form::label('proveedor1','Proveedor: ') !!}
                        {!! Form::text('proveedor1',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}

                                  
                        {!! Form::label('url_img1','Imagen: ') !!}
                        {!! form::file('imagen1',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                        
                      </div>

                      <div class="col-xs-4">
                        <h3>Opcion B</h3>

                        {!! Form::label('nombre2','Nombre: ') !!}
                        {!! Form::text('nombre2',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion2','Descripcion: ') !!}
                        {!! Form::textarea('descripcion2',null,['class'=>'form-control','row'=>'3','placeholder'=>'Descripcion....']) !!}

                        {!! Form::label('precio2','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio2',null,['class'=>'form-control','placeholder'=>'Precio']) !!}

                        </div>
                              
                        {!! Form::label('proveedor2','Proveedor: ') !!}
                        {!! Form::text('proveedor2',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}

                                  
                        {!! Form::label('url_img2','Imagen: ') !!}
                        {!! form::file('imagen2',null,['class' => 'form-control']) !!}
                        <p class="help-block">Archivo no mayor a 2 Mb</p>
                        
                      </div>
                      <div class="col-xs-4">
                        <h3>Opcion C</h3>

                        {!! Form::label('nombre3','Nombre: ') !!}
                        {!! Form::text('nombre3',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}

                        {!! Form::label('descripcion3','Descripcion: ') !!}
                        {!! Form::textarea('descripcion3',null,['class'=>'form-control','row'=>'3','placeholder'=>'Descripcion....']) !!}

                        {!! Form::label('precio3','Precio: ') !!}
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          {!! Form::text('precio3',null,['class'=>'form-control','placeholder'=>'Precio']) !!}

                        </div>
                              
                        {!! Form::label('proveedor3','Proveedor: ') !!}
                        {!! Form::text('proveedor3',null,['class'=>'form-control','placeholder'=>'Proveedor']) !!}

                                  
                        {!! Form::label('url_img3','Imagen: ') !!}
                        {!! form::file('imagen3',null,['class' => 'form-control']) !!}
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