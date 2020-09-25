<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="servicioForm" name="servicioForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="puesto" class="col-sm-4 ">Codigo del servicio</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Enter codigo de servicio" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-4 ">Descripcion del servicio</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Enter descripcion" value="" maxlength="50" required="">
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