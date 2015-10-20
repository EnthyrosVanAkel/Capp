@extends ('admin')


@section ('tax')




       <section class="content-header">
          <h1>
            Impuestos y Comisiones
          </h1>
        </section>

        <!-- Contenidos -->
        <section class="content">
          <div class="row">

            <!-- Formulario nueva comicion -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nueva impuesto o comisión</h3>
                </div><!-- /.box-header -->

                <!-- Form -->
                {!!Form::open(['url' => 'admin/tax']) !!}
                  <div class="box-body">
                    <div class="form-group col-xs-offset-2 col-xs-8">
                      {!! Form::label('concepto','Concepto: ') !!}
                      {!! Form::text('concepto',null,['class'=>'form-control','placeholder'=>'Concepto']) !!}

                      {!! Form::label('monto','Monto: ') !!}
                      <div class="input-group">
                      {!! Form::text('monto',null,['class'=>'form-control','placeholder'=>'Porcentaje']) !!}
                      <span class="input-group-addon">%</span>
                      </div>
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
            </div> <!-- End Formulario nueva comicion -->

          </div> 

        </section>  <!-- End Contenidos -->





@stop
