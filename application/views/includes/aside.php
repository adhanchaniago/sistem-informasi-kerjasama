<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('assets/adminlte/dist/img/user-icon-placeholder.png'); ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $this->session->lg_username; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN</li>
    <li class=""><a href="<?php echo base_url("Dashboard") ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <?php if (is_display(['crud_coop'])) : ?>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Kerjasama</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Main/CreateCoop') ?>">Tambah Kerjasama</a></li>
          <li><a href="<?php echo base_url('Main/Coop') ?>">Daftar Kerjasama</a></li>
        </ul>
      </li>
    <?php endif ?>

    <?php if (is_display(['coop_status_change'])) : ?>
      <li class=""><a href="<?php echo base_url('Main/StatusCoop') ?>"><i class="fa fa-user"></i> <span>Status Kerjasama</span></a></li>
    <?php endif ?>
    <?php if (is_display(['config_email'])) : ?>
      <li class=""><a href="<?php echo base_url('Main/ConfigEmail') ?>"><i class="fa fa-user"></i> <span>Configure Email</span></a></li>
    <?php endif ?>
    <li class="header">Management</li>
    <?php if (is_display(['crud_user'])) : ?>

      <li class=""><a href="<?php echo base_url('Management/User') ?>"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
    <?php endif ?>
    <?php if (is_display(['crud_coop_type'])) : ?>

      <li class=""><a href="<?php echo base_url('Management/CoopType') ?>"><i class="fa fa-user"></i> <span>Jenis Kerjasama</span></a></li>
    <?php endif ?>
  </ul>
</section>