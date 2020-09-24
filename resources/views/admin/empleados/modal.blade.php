<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="empleadosForm" name="empleadosForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="beneficiario" class="col-sm-2 ">Numero de empleado</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="num_empleado" name="num_empleado" placeholder="Enter numero de empleado" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-4 ">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre" value="" maxlength="50" required="">
                        </div>
                   
                    <div class="form-group pull pull-right">
                     <button type="submit" class="btn btn-primary form-control" id="saveBtn" value="create">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>