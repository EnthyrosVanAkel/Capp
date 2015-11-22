
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
                {!! Form::model($escoger,['method' => 'PATCH','action'=>['EscogerController@update',$id_catalogo,$escoger->id]]) !!}
                   <div class="box-body">

                    <div class="form-group col-xs-12">

                      {!! Form::label('seccion','Sección: ') !!}
                        {!! Form::text('seccion',null,['class'=>'form-control','placeholder'=>'Nombre de la Sección']) !!}


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