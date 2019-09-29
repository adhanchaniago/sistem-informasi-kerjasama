<script>
    var cname = "<?php echo $cname ?>";
    var lg_username = "<?php echo $this->session->userdata('lg_username') ?>";
    $(document).ready(function() {

         
    });

    var change_status = (btnObj) => {
        var elemButton = $(btnObj);
        var id = elemButton.data('id');
        var status = elemButton.data('status');
        $('.btn-change-status[data-id="' + id + '"]').attr('disabled', true);
        $.ajax({
            url: base_url + '/' + cname + "/change_status",
            type: "POST",
            data: {
                id: id,
                status: status
            },
            success: (data) => {
                $('.btn-change-status[data-id="' + id + '"]').attr('disabled', false);
                $('.btn-change-status[data-id="' + id + '"]').removeClass('btn-primary').removeClass('btn-default').addClass('btn-default');
                elemButton.addClass('btn-primary').removeClass('btn-default');
            }
        })
    }
</script>