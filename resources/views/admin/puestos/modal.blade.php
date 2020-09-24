<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="puestoForm" name="puestoForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="puesto" class="col-sm-2 ">Codigo del puesto</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Enter codigo de puesto" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-4 ">Descripcion del puesto</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Enter descripcion" value="" maxlength="50" required="">
                        </div>
                   
                    <div class="form-group pull pull-right">
                     <button type="submit" class="btn btn-primary form-control" id="saveBtn" value="create">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>