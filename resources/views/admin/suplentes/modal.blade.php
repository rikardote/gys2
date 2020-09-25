<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="suplentesForm" name="suplentesForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="beneficiario" class="col-sm-4 ">No. Beneficiario</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="beneficiario" name="beneficiario" placeholder="Enter beneficiario" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-4 ">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 ">Apellido Paterno</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Enter apellido_pat" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 ">Apellido Materno</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Enter apellido_mat" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 ">RFC</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Enter rfc" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 ">CURP</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Enter curp" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 ">Clave Interbancaria</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="clabe" name="clabe" placeholder="Enter clabe" value="" maxlength="50" required="">
                        </div>
                    </div> 
                   <div class="form-group">
                       <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary form-control" id="saveBtn" value="create">Guardar</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>