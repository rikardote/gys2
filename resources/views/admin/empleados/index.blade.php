@extends('home')

@section('title', 'Empleados')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/media/css/datatables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="container">
		<a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Agregar Empleado</a>
		<table class="table table-bordered data-table">
			<thead>
			<tr>
				<th>NUM. EMPLEADO</th>
				<th>NOMBRE</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		@include('admin.empleados.modal')
</div>	

@endsection
@section('js')
<script type="text/javascript">
	$(function () {
	   
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	  });
	   
	  var table = $('.data-table').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: "{{ route('empleados.index') }}",
		  columns: [
			  {data: 'num_empleado', name: 'num_empleado'},
			  {data: 'nombre', name: 'nombre'},
			  {data: 'action', name: 'action', orderable: false, searchable: false},
		  ]
	  });
	   
	  $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#empleadosForm').trigger("reset");
        $('#modelHeading').html("Agregar Nuevo Empleado");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('empleados.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Editar Datos de Empleado");
          $('#saveBtn').val("editar");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#num_empleado').val(data.num_empleado);
          $('#nombre').val(data.nombre);

      })
   	});
	$('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Sending..');
    
        $.ajax({
          data: $('#empleadosForm').serialize(),
          url: "{{ route('empleados.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#empleadosForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
	$('body').on('click', '.deleteProduct', function () {
     
	 var id = $(this).data("id");
	 confirm("Are You sure want to delete !");
   
	 $.ajax({
		 type: "DELETE",
		 url: "{{ route('empleados.store') }}"+'/'+id,
		 success: function (data) {
			 table.draw();
		 },
		 error: function (data) {
			 console.log('Error:', data);
		 }
	 });
 });


});

  </script>
@endsection