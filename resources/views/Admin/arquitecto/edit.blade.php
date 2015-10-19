@extends ('admin')


@section ('arquitecto')

<h1>{{$arquitecto->nombre}}</h1>

{!! Form::model($arquitecto,['method' => 'PATCH','action'=>['ArquitectoController@update',$arquitecto->id]]) !!}
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
{!! Form::submit('Modificar Arquitecto:',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'  => 'DELETE','route' =>['admin.arquitecto.destroy',$arquitecto->id]]) !!}
<div class="form-group">
	{!! Form::submit('Eliminar Arquitecto:',['class'=>'btn btn-danger form-control']) !!}
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
