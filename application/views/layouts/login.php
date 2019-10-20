<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('includes/head') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>"><b>SI</b> Kerjasama</a>
        </div>
        <?php if ($this->session->flashdata('login_message') != null) : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('login_message') ?>
            </div>
        <?php endif ?>
        <div class="login-box-body">
            <p class="login-box-msg">Login terlebih dahulu</p>

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.placeholder='masukan username'" onblur="this.placeholder='Username'" value="<?php echo set_value('username') ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php echo form_error('username', '<span class="text-danger">', '</span>') ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder='masukan password'" onblur="this.placeholder='Password'">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php echo form_error('password', '<span class="text-danger">', '</span>') ?>
                </div>
                <div class="row">
                    <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php $this->load->view('includes/foot') ?>

    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>