<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Email Konfigurasi</h3>
      </div>
      <div class="box-body">
        <?php echo form_open($cname . '/change_config', ['id' => 'form-create', 'class' => 'form-horizontal']) ?>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Protocol</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_protocol]" class="form-control" id="input-email_protocol" value="<?php echo $_config['email_protocol'] ?>" placeholder="input email_protocol">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">SMTP Host</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_smtp_host]" class="form-control" id="input-email_smtp_host" value="<?php echo $_config['email_smtp_host'] ?>" placeholder="input email_smtp_host">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">SMTP Port</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_smtp_port]" class="form-control" id="input-email_smtp_port" value="<?php echo $_config['email_smtp_port'] ?>" placeholder="input email_smtp_port">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_username]" class="form-control" id="input-email_username" value="<?php echo $_config['email_username'] ?>" placeholder="input email_username">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_password]" class="form-control" id="input-email_password" value="<?php echo $_config['email_password'] ?>" placeholder="input email_password">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-2 control-label"></label>
          <div class="col-sm-10">

            <input type="submit" value="Change" class="btn btn-primary">
          </div>
        </div>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Email Target</h3>
      </div>
      <div class="box-body">
        <?php echo form_open($cname . '/change_config', ['id' => 'form-create', 'class' => 'form-horizontal']) ?>

        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Subject</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_subject]" class="form-control" id="input-email_subject" value="<?php echo $_config['email_subject'] ?>" placeholder="input email_subject">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">CC</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_from_cc]" class="form-control" id="input-email_from_cc" value="<?php echo $_config['email_from_cc'] ?>" placeholder="input email_from_cc">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_from_text]" class="form-control" id="input-email_from_text" value="<?php echo $_config['email_from_text'] ?>" placeholder="input email_username">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Recipient</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_recipient]" class="form-control" id="input-email_recipient" value="<?php echo $_config['email_recipient'] ?>" placeholder="input email_username">
          </div>
        </div>
        <div class="form-group">
          <label for="input-coop_number" class="col-sm-2 control-label">Max Send</label>
          <div class="col-sm-10">
            <input type="text" name="config[email_max_send]" class="form-control" id="input-email_max_send" value="<?php echo $_config['email_max_send'] ?>" placeholder="input email_username">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label"></label>
          <div class="col-sm-10">

            <input type="submit" value="Change" class="btn btn-primary">
          </div>
        </div>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Email LOG</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Penerima</th>
              <th>Status</th>
              <th>Message</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_emailing as $key => $value) : ?>
              <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $value->date ?></td>
                <td><?php echo $value->recipient ?></td>
                <td>
                  <?php if ($value->status == 1) : ?>
                    <span class="label label-primary">success</span>
                  <?php else : ?>
                    <span class="label label-warning">failed</span>
                  <?php endif ?>
                </td>
                <td><?php echo $value->message ?></td>
                <td>
                  <?php if ($value->status != 1) : ?>
                    <a href="<?php echo base_url($cname . '/send_retry/' . $value->id) ?>" class="btn btn-success btn-xs">Retry</a>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Email Sender</h3>
      </div>
      <div class="box-body">

        <a href="<?php echo base_url($cname . "/send_email") ?>" class="btn btn-primary">Send Manual</a> / Using CronJob
      </div>
    </div>
  </div>
</div>