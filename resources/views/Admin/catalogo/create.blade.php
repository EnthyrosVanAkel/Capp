
@extends ('admin')


@section ('contenido')

<h1> Crear Catalogo </h1>
{!! Form::open(['url' => 'admin/catalogo']) !!}
  <div class="form-group">
  {!! Form::label('modelo','Modelo: ') !!}
  {!! Form::text('modelo',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('acceso','Acceso: ') !!}
{!! Form::text('acceso',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Crear Catalogo:',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

@if ($errors->any())
	<ul class="alert alert-damage">
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</u>
@endif


@stop
