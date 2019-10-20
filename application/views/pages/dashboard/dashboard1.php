

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Chart Kerjasama</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChart" height="165" width="253" style="width: 253px; height: 165px;"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <li><i class="fa fa-circle-o text-green"></i> Aktif</li>
          <li><i class="fa fa-circle-o text-yellow"></i> Akan kadaluarsa</li>
          <li><i class="fa fa-circle-o text-red"></i> Kadaluarsa</li>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <!-- /.footer -->
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Kerjasama yang akan kadaluarsa</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered dataTables">
      <thead>
        <tr>
          <th>No</th>
          <th>Perusahaan</th>
          <th>End Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($coop_will_expired as $key => $value) : ?>
          <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $value->company_name ?></td>
            <td><?php echo $value->end_date ?></td>
            
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">LOG Email</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered dataTables">
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
                <a href="<?php echo base_url('Main/ConfigEmail/send_retry/' . $value->id) ?>" class="btn btn-success btn-xs">Retry</a>
              <?php endif ?>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
