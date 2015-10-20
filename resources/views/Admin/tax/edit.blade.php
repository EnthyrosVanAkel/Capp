@extends ('admin')


@section ('tax')

<h1>{{$tax->nombre}}</h1>

{!! Form::model($tax,['method' => 'PATCH','action'=>['TaxController@update',$tax->id]]) !!}
  <div class="form-group">
  {!! Form::label('concepto','Concepto: ') !!}
  {!! Form::text('concepto',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('monto','Monto') !!}
{!! Form::text('monto',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Agregar Tax:',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'  => 'DELETE','route' =>['admin.tax.destroy',$tax->id]]) !!}
<div class="form-group">
	{!! Form::submit('Eliminar tax:',['class'=>'btn btn-danger form-control']) !!}
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
