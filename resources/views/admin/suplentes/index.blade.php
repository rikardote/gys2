@extends('home')

@section('title', 'SUPLENTES')



@section('content')

<div class="container">

	<a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Agregar Suplente</a>
	<hr>

	<table class="table table-striped table-bordered data-table">
			<thead>
			<tr>
				<th>NUM. EMPLEADO</th>
				<th>NO. BENEFICIARIO</th>
				<th>NOMBRE</th>
				<th>APELLIDO PAT</th>
				<th>APELLIDO MAT</th>
				<th>RFC</th>
				<th>CURP</th>
				<th>CLABE INTERBANCARIA</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
	</table>

	@include('admin.suplentes.modal')
	
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
		  ajax: "{{ route('suplentes.index') }}",
		  columns: [
			  {data: 'id', name: 'id'},
			  {data: 'beneficiario', name: 'beneficiario'},
			  {data: 'nombre', name: 'nombre'},
			  {data: 'apellido_pat', name: 'apellido_pat'},
			  {data: 'apellido_mat', name: 'apellido_mat'},
			  {data: 'rfc', name: 'rfc'},
			  {data: 'curp', name: 'curp'},
			  {data: 'clabe', name: 'clabe'},
			  {data: 'action', name: 'action', orderable: false, searchable: false},
		  ]
	  });
	   
	  $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#suplentesForm').trigger("reset");
        $('#modelHeading').html("Agregar Nuevo Suplente");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
      $.get("{{ route('suplentes.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Editar Datos de Suplente");
          $('#saveBtn').val("editar");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#beneficiario').val(data.beneficiario);
          $('#nombre').val(data.nombre);
		  $('#apellido_pat').val(data.apellido_pat);
		  $('#apellido_mat').val(data.apellido_mat);
		  $('#rfc').val(data.rfc);
		  $('#curp').val(data.curp);
		  $('#clabe').val(data.clabe);

      })
   	});
	$('#saveBtn').click(function (e) {
        e.preventDefault();
        //$(this).html('Sending..');
    
        $.ajax({
          data: $('#suplentesForm').serialize(),
          url: "{{ route('suplentes.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#suplentesForm').trigger("reset");
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
		 url: "{{ route('suplentes.store') }}"+'/'+id,
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