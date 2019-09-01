<div class="row">
  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-sm btn-primary" onclick="add_form()"><i class="fa fa-plus"></i> Tambah</button>
        <button type="button" class="btn btn-sm btn-success" onclick="save_all()"><i class="fa fa-plus"></i> Simpan Semua</button>
        
      </div>
    </div>
    <div class="row hidden-sm hidden-xs" style="margin-top:1.5rem;">
      <div class="col-md-12">
        <div class="nav-scroll">
          <ul class="nav nav-pills nav-stacked" id="form-nav-container">

          </ul>
        </div>
      </div>
    </div>



  </div>
  <div class="col-md-9">
    <div class="form-scroll" id="form-container">
    </div>
  </div>
  <div class="modal fade" id="modal-default" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" id="modal-body-container">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="modal-btn-accept" form="">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>