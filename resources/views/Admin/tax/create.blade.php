@extends ('admin')


@section ('ctax')
Crear Catalogo </h1>orm::open(['url' => 'admin/tax']) !!}
  <div class="form-group">
  {!! Form::label('concepto','Modelo: ') !!}
  {!! Form::text('concepto',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('monto','Acceso: ') !!}
{!! Form::text('monto',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Crear Tax:',['class'=>'btn btn-primary form-control']) !!}
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
