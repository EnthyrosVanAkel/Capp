
@extends ('admin')


@section ('Arquitecto')

<h1> Crear Arquitecto </h1>
{!! Form::open(['url' => 'admin/arquitecto']) !!}
  <div class="form-group">
  {!! Form::label('nombre','Nombre: ') !!}
  {!! Form::text('nombre',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('descripcion','Descripcion: ') !!}
{!! Form::textarea('descripcion',null,['class'=>'form-control']) !!}
</div>
  <div class="form-group">
  {!! Form::label('url_img','Imagen: ') !!}
  {!! Form::text('url_img',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Crear Arquitecto:',['class'=>'btn btn-primary form-control']) !!}
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
