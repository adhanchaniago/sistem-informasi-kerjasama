<script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- SweatAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/adminlte/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
    window.base_url = '<?php echo base_url(); ?>';

    var filename = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
    $('a[href*='+filename+']').parent().addClass('active').parents('.treeview').addClass('menu-open').find('.treeview-menu').css('display','block');
</script>
<?php if(isset($script)){ $this->load->view($script); } ?>