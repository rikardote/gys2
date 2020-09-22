@extends('home')

@section('title', 'SUPLENTES')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/media/css/datatables.bootstrap.min.css') }}">
@endsection

@section('content')
	<a class="noprint btn btn-info pull pull-left" href="{{route('suplentes.create') }}">Crear nomina</a>
	<div class="container">
		<table id="suplente" class="table table-hover table-condensed">
			<thead>
			<tr>
				<th>NUM. EMPLEADO</th>
				<th>NO. BENEFICIARIO</th>
				<th>NOMBRE</th>
				<th>RFC</th>
				<th>CURP</th>
				<th>CLABE INTERBANCARIA</th>
			</tr>
			</thead>
		</table>
	</div>	

@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#suplente').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ route('datatable.suplentes') }}",
			"columns": [
				{data: 'id', name: 'id'},
				{data: 'beneficiario', name: 'beneficiario'},
				{ data: null,
					render: function ( data, type, row ) {
					return row.nombre + ' ' + row.apellido_pat + ' ' + row.apellido_mat;
				}
				},				
				{data: 'rfc', name: 'rfc'},
				{data: 'curp', name: 'curp'},
				{data: 'clabe', name: 'clabe'}
			]
		});
	});
</script>
@endsection