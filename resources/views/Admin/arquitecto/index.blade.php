@extends ('admin')


@section ('arquitecto')


<div class="panel panel-default">
	<div class="panel panel-heading">Lista de Arquitectos</div>
	<table class="table table-responsive table-bordered">
		<thead>
			<tr>
				<th>Arquitecto</th>
				<th>Accciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($arquitectos as $arquitecto)
			<tr>
				<td>{{$arquitecto->nombre}}</td>
				<td>
					<a href="/admin/arquitecto/{{$arquitecto->id}}/edit" class="btn btn-warning btn-xs">Editar</a>
					<a href="/admin/arquitecto/{{$arquitecto->id}}" class="btn btn-success btn-xs">Mostrar</a>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>

@stop
