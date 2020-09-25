@extends('home')

@section('title', 'Puestos')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/media/css/datatables.bootstrap.min.css') }}">
@endsection

@section('content')
<a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Agregar Puesto</a>
<hr>
<div class="container">
		
		<table class="table table-bordered data-table">
			<thead>
			<tr>
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		@include('admin.puestos.modal')
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
		  ajax: "{{ route('puestos.index') }}",
		  columns: [
			  {data: 'puesto', name: 'puesto'},
			  {data: 'descripcion', name: 'descripcion'},
			  {data: 'action', name: 'action', orderable: false, searchable: false},
		  ]
	  });
	   
	  $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#puestoForm').trigger("reset");
        $('#modelHeading').html("Agregar Nuevo puesto");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('puestos.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Editar Datos del puesto");
          $('#saveBtn').val("editar");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#puesto').val(data.puesto);
          $('#descripcion').val(data.descripcion);

      })
   	});
	$('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Sending..');
    
        $.ajax({
          data: $('#puestoForm').serialize(),
          url: "{{ route('puestos.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#servicioForm').trigger("reset");
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
		 url: "{{ route('puestos.store') }}"+'/'+id,
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