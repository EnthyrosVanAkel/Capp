@extends ('admin')


@section ('catalogo')

<h1>{{$catalogo->nombre}}</h1>

{!! Form::model($catalogo,['method' => 'PATCH','action'=>['CatalogoController@update',$catalogo->id]]) !!}
  <div class="form-group">
  {!! Form::label('modelo','Nombre: ') !!}
  {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo']) !!}
</div>
<div class="form-group">
{!! Form::label('acceso','Descripciòn: ') !!}
{!! Form::text('acceso',null,['class'=>'form-control','placeholder'=>'Password']) !!}
</div>
<div class="form-group">
{!! Form::submit('Agregar Articulo:',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'  => 'DELETE','route' =>['admin.catalogo.destroy',$catalogo->id]]) !!}
<div class="form-group">
	{!! Form::submit('Eliminar Articulo:',['class'=>'btn btn-danger form-control']) !!}
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
