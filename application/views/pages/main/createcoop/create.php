<div class="box" id="form-coop-<?php echo $index_form?>">
    <div class="box-header">
        <h3 class="box-title">Kerjasama <span id="coop-number"><?php echo $index_form ?></span></h3>
        <button type="submit" class="btn btn-xs btn-primary pull-right" id="modal-btn-accept" form="form-create-<?php echo $index_form?>">Submit</button>
        <button class="btn btn-xs btn-danger pull-right" id="btn-delete" onclick="remove_form('#form-coop-<?php echo $index_form?>')"><i class="fa fa-trash"></i></button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open($cname . '/action_create', ['id' => 'form-create-'.$index_form, 'class' => 'form-horizontal']) ?>
                <div class="form-group">
                    <label for="input-company_name" class="col-sm-2 control-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="company_name" class="form-control" id="input-company_name" placeholder="input company_name" onkeypress="return onlyAlphaSpace(event)" list="list-company">
                        <datalist id="list-company">
                            <?php foreach ($list_company as $key => $value) : ?>
                                <option value="<?php echo $value->name ?>" data-address="<?php echo $value->address ?>"><?php echo $value->name ?></option>
                            <?php endforeach ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-company_address" class="col-sm-2 control-label">Alamat Perusahaan</label>
                    <div class="col-sm-10">
                        <textarea name="company_address" class="form-control" id="input-company_address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-coop_number" class="col-sm-2 control-label">No</label>
                    <div class="col-sm-10">
                        <input type="text" name="coop_number" class="form-control" id="input-coop_number" placeholder="input coop_number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-description" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" id="input-description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-start_date" class="col-sm-2 control-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="date" name="start_date" class="form-control" id="input-start_date" placeholder="input start_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-end_date" class="col-sm-2 control-label">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <input type="date" name="end_date" class="form-control" id="input-end_date" placeholder="input end_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-end_date" class="col-sm-2 control-label">Jenis Kerjasama</label>
                    <div class="col-sm-10">
                        <select name="fk_coop_type" class="form-control select2" style="width: 100%;">
                            <option disabled selected="selected">Pilih</option>
                            <?php foreach ($list_coop_type as $key => $value) : ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>