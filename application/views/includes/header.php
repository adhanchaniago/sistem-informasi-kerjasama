<a href="index2.html" class="logo">
  <span class="logo-mini"><b>SI</b>K</span>
  <span class="logo-lg"><b>SI</b> Kerjasama</span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <?php
      $coop_expired = $this->db->get('vw_chart_coop')->row(0)->will_expired;
      ?>
      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning"><?php echo ($coop_expired == 0 ? '0' : '1') ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have <?php echo ($coop_expired == 0 ? '0' : '1') ?> notifications</li>
          <li>
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-users text-aqua"></i> <?php echo $coop_expired ?> kerjasama yang akan kadaluarsa
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url('assets/adminlte/dist/img/user-icon-placeholder.png'); ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata('lg_username') ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="<?php echo base_url('assets/adminlte/dist/img/user-icon-placeholder.png'); ?>" class="img-circle" alt="User Image">

            <p>
              <?php echo $this->session->userdata('lg_username') ?> - <?php echo $this->session->userdata("lg_acl")['type'] ?>
            </p>
          </li>
          <li class="user-footer">
            <div class="pull-right">
              <a href="<?php echo base_url('Logout') ?>" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</nav>