<div class="row">
    <div class="col-md-12">
        <?php echo form_open($cname . '/action_update', ['id' => 'form-update', 'class' => 'form-horizontal']) ?>
        <input type="hidden" name="id" value="<?php echo $coop->id ?>">
        <div class="form-group">
            <label for="input-company_name" class="col-sm-2 control-label">Nama Perusahaan</label>
            <div class="col-sm-10">
                <input type="text" name="company_name" class="form-control" id="input-company_name" value="<?php echo $coop->company_name ?>" placeholder="input company_name" onkeypress="return onlyAlphaSpace(event)"  list="list-company">
                <datalist id="list-company">
                    <?php foreach($list_company as $key => $value): ?>
                        <option value="<?php echo $value->name ?>" data-address="<?php echo $value->address ?>"><?php echo $value->name ?></option>
                    <?php endforeach ?>
                </datalist>
            </div>
        </div>
        <div class="form-group">
            <label for="input-company_address" class="col-sm-2 control-label">Alamat Perusahaan</label>
            <div class="col-sm-10">
                <textarea name="company_address" class="form-control" id="input-company_address"><?php echo $coop->company_address ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="input-coop_number" class="col-sm-2 control-label">No</label>
            <div class="col-sm-10">
                <input type="text" name="coop_number" class="form-control" id="input-coop_number" value="<?php echo $coop->coop_number ?>" placeholder="input coop_number">
            </div>
        </div>
        <div class="form-group">
            <label for="input-description" class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="input-description"><?php echo $coop->description ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="input-start_date" class="col-sm-2 control-label">Tanggal Mulai</label>
            <div class="col-sm-10">
                <input type="date" name="start_date" class="form-control" id="input-start_date" value="<?php echo $coop->start_date ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-end_date" class="col-sm-2 control-label">Tanggal Selesai</label>
            <div class="col-sm-10">
                <input type="date" name="end_date" class="form-control" id="input-end_date" value="<?php echo $coop->end_date ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-end_date" class="col-sm-2 control-label">Jenis Kerjasama</label>
            <div class="col-sm-10">
                <select name="fk_coop_type" class="form-control select2" style="width: 100%;" id="select-jenis-kerjasama">
                    <option disabled selected="selected">Pilih</option>
                    <?php foreach($list_coop_type as $key => $value): ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                    <?php endforeach ?>
                </select>
                <script>$('#select-jenis-kerjasama').val('<?php echo $coop->fk_coop_type ?>');</script>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>