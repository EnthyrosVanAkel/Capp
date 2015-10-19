@extends ('admin')


@section ('catalogo')


<div class="panel panel-default">
	<div class="panel panel-heading">Lista de Catalogos</div>
	<table class="table table-responsive table-bordered">
		<thead>
			<tr>
				<th>Catalogo</th>
				<th>Accciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($catalogos as $catalogo)
			<tr>
				<td>{{$catalogo->modelo}}</td>
				<td>
					<a href="/admin/catalogo/{{$catalogo->id}}/edit" class="btn btn-warning btn-xs">Editar</a>
					<a href="/admin/catalogo/{{$catalogo->id}}" class="btn btn-success btn-xs">Mostrar</a>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>

@stop
