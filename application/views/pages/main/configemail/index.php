<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Kerjasama</h3>
      </div>
      <div class="box-body">
        <?php echo form_open($cname . '/change_config', ['id' => 'form-create', 'class' => 'form-horizontal']) ?>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_protocol</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_protocol]" class="form-control" id="input-email_protocol" value="<?php echo $_config['email_protocol'] ?>" placeholder="input email_protocol">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_smtp_host</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_smtp_host]" class="form-control" id="input-email_smtp_host" value="<?php echo $_config['email_smtp_host'] ?>" placeholder="input email_smtp_host">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_smtp_port</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_smtp_port]" class="form-control" id="input-email_smtp_port" value="<?php echo $_config['email_smtp_port'] ?>" placeholder="input email_smtp_port">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_username</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_username]" class="form-control" id="input-email_username" value="<?php echo $_config['email_username'] ?>" placeholder="input email_username">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_password</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_password]" class="form-control" id="input-email_password" value="<?php echo $_config['email_password'] ?>" placeholder="input email_password">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_subject</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_subject]" class="form-control" id="input-email_subject" value="<?php echo $_config['email_subject'] ?>" placeholder="input email_subject">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_from_cc</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_from_cc]" class="form-control" id="input-email_from_cc" value="<?php echo $_config['email_from_cc'] ?>" placeholder="input email_from_cc">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">email_from_text</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_from_text]" class="form-control" id="input-email_from_text" value="<?php echo $_config['email_from_text'] ?>" placeholder="input email_username">
          </div>
        </div>
        <input type="submit">
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>