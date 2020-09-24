@extends('home')

@section('title', 'Servicios')

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/media/css/datatables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="container">
		<a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Agregar Servicio</a>
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
		@include('admin.servicios.modal')
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
		  ajax: "{{ route('servicios.index') }}",
		  columns: [
			  {data: 'servicio', name: 'servicio'},
			  {data: 'descripcion', name: 'descripcion'},
			  {data: 'action', name: 'action', orderable: false, searchable: false},
		  ]
	  });
	   
	  $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#servicioForm').trigger("reset");
        $('#modelHeading').html("Agregar Nuevo servicio");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('servicios.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Editar Datos del servicio");
          $('#saveBtn').val("editar");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#servicio').val(data.servicio);
          $('#descripcion').val(data.descripcion);

      })
   	});
	$('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Sending..');
    
        $.ajax({
          data: $('#servicioForm').serialize(),
          url: "{{ route('servicios.store') }}",
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
		 url: "{{ route('servicios.store') }}"+'/'+id,
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