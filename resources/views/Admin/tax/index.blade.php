@extends ('admin')


@section ('tax')


<div class="panel panel-default">
	<div class="panel panel-heading">Lista deTaxes</div>
	<table class="table table-responsive table-bordered">
		<thead>
			<tr>
				<th>Taxes</th>
				<th>Accciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($taxes as $tax)
			<tr>
				<td>{{$tax->modelo}}</td>
				<td>
					<a href="/admin/tax/{{$tax->id}}/edit" class="btn btn-warning btn-xs">Editar</a>
					<a href="/admin/tax/{{$tax->id}}" class="btn btn-success btn-xs">Mostrar</a>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>

@stop
