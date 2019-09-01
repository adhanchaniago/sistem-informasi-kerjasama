<script>
  var cname = "<?php echo $cname ?>";
  var index_form = 1;

  $(document).ready(function() {
    $(".nav-scroll").slimScroll({
      size: '4px',
      height: window.innerHeight - 217,
      color: '#ff4800',
      allowPageScroll: true,
      alwaysVisible: true
    });

    $(".form-scroll").slimScroll({
      size: '4px',
      height: window.innerHeight - 172,
      color: '#ff4800',
      allowPageScroll: true,
      alwaysVisible: true
    });

    $("form#form-upload-excel").submit(function(e) {
      e.preventDefault();

      let elementForm = $(this);
      let formData = new FormData(this);

      $.ajax({
        url: elementForm.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        success: function(data) {
          Object.keys(data.data).forEach(function(key) {
            add_form(data.data[key]);
          });
          elementForm.trigger('reset');
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });

    $('#input-upload').change(function() {
      $("form#form-upload-excel").submit();
    });
  });

  var add_form = (row_data = null) => {
    $.ajax({
      url: base_url + '/' + cname + "/create",
      type: "POST",
      data: {
        index_form: index_form,
        row_data : row_data
      },
      async: false,
      success: (data) => {
        $('#form-container').append(data);
        let index = $('#form-container').find('.box:last').data('index');
        $('#form-nav-container').append('<li><a href="#form-coop-' + index + '">Kerjasama <span class="coop-number">' + index + '</span> <button class="btn btn-xs btn-danger pull-right" onclick="remove_form(\'#form-coop-' + index + '\')"><i class="fa fa-trash"></i></button></a></li>');

        let newForm = $('#form-coop-' + index);

        newForm.find('.select2').select2();
        newForm.find('#input-company_name').change(function() {
          let address = newForm.find('#list-company').find('[value="' + $(this).val() + '"]').data('address');
          newForm.find('#input-company_address').val(address);
        });
        newForm.find("#input-start_date").change(function() {
          newForm.find('#input-end_date').prop('min', $(this).val());
        })
        Object.keys(row_data).forEach(function(key) {
          newForm.find('[name="'+key+'"]').val(row_data[key]).trigger('change');
          });

        newForm.find('form').submit(function(e) {
          e.preventDefault();

          let elementForm = $(this);
          let formData = new FormData(this);

          $.ajax({
            url: elementForm.attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            success: function(data) {
              if (data.code == '0') {
                newForm.find('#btn-delete').click();
                $.toast({
                  heading: data.title,
                  text: data.message,
                  position: 'top-right',
                  loaderBg: '#ff6849',
                  icon: 'success',
                  hideAfter: 2500,
                  stack: 10
                });
              } else {
                elementForm.find('.has-error').removeClass('has-error');
                elementForm.find('.help-block').remove();
                Object.keys(data.array_error).forEach(function(key) {
                  let elementInput = elementForm.find('[name="' + key + '"]');
                  elementInput.parents('.form-group').addClass('has-error');
                  elementInput.parent().append('<span class="help-block">' + data.array_error[key] + '</span>');
                });
              }
            },
            cache: false,
            contentType: false,
            processData: false
          });
        });

        
      }
    });
    index_form++;
  };

  var remove_form = (form_target) => {
    $('[href="' + form_target + '"]').parent().fadeOut(300, function() {
      $(this).remove();
    });
    $(form_target).fadeOut(300, function() {
      $(this).remove();
    });

  }

  var renumbering = () => {
    let number = 1;
    $('#form-container').find('.box').each(function(i, obj) {
      $(obj).find('#coop-number').text(number);
      number++;
    });

    number = 1;
    $('#form-nav-container').find('.coop-number').each(function(i, obj) {
      $(obj).text(number);
      number++;
    })

  }

  var save_all = () => {
    $('#form-container').find('.box').each(function(i, obj) {
      $(obj).find('button[type=submit]').click();
    });
  }
</script>