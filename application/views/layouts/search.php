<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet" />
    <link href="<?php echo base_url('assets/colorlib-search-9/') ?>css/main.css" rel="stylesheet" />
    <style>
        .data-container {
            width: 100%;
        }

        .data-content {
            margin: 1rem 0rem;
            background: #fff;
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .data-content .data-content-header {
            padding: 1rem 1.5rem;
        }

        .data-content .data-content-body {
            display: none;
            border-top: 2px solid #00bbec;
            padding: 1rem 1.5rem;
        }
    </style>
</head>

<body>
    <div class="s009">

        <div style="height:100px;background-color:red;width: 100%;position: fixed;top:0;z-index:1000;">sad</div>
        <form method="post" id="form-search" action="<?php echo base_url($cname . "/get_data") ?>">
            <div style="height: 100px;"></div>
            <div class="inner-form">
                <div class="basic-search" style="">
                    <div class="input-field">
                        <input id="search" type="text" placeholder="Type Keywords" />
                        <div class="icon-wrap">
                            <svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="advance-search">
                    <span class="desc">ADVANCED SEARCH</span>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Accessories</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Color</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Size</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row third">
                        <div class="input-field">
                            <div class="result-count">
                                <span>108 </span>results</div>
                            <div class="group-btn">
                                <button class="btn-delete" id="delete">RESET</button>
                                <button class="btn-search">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="data-container">

                </div>
            </div>
        </form>
    </div>
    <div class="sample-data-content" style="display:none">
        <div class="data-content" id="coop-[key]" data-key="[key]" onclick="show_detail(this)">
            <div class="data-content-header">
                [coopname]
            </div>
            <div class="data-content-body">
                [coopaddress]
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/colorlib-search-9/') ?>js/extention/choices.js"></script>
    <script>
        const customSelects = document.querySelectorAll("select");
        const deleteBtn = document.getElementById('delete')
        const choices = new Choices('select', {
            searchEnabled: false,
            itemSelectText: '',
            removeItemButton: true,
        });
        deleteBtn.addEventListener("click", function(e) {
            e.preventDefault()
            const deleteAll = document.querySelectorAll('.choices__button')
            for (let i = 0; i < deleteAll.length; i++) {
                deleteAll[i].click();
            }
        });


        //mine
        var data_coop = [];

        $(document).ready(function() {
            $('#form-search').submit(function(e) {
                e.preventDefault();
                let elementForm = $(this);
                let formData = new FormData(this);

                $.ajax({
                    url: elementForm.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        data_coop = data.data;
                        show_data();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        })

        var show_data = () => {
            let html = $('.sample-data-content').html();
            $('.data-container').slideUp("normal", function() {
                $(this).html("");
                Object.keys(data_coop).forEach(function(key) {
                    let new_html = html.split("[coopname]").join(data_coop[key].company_name);
                    new_html = new_html.split("[key]").join(key);
                    new_html = new_html.split("[coopaddress]").join(data_coop[key].company_address);
                    $('.data-container').append(new_html);

                });
                $('.data-container').slideDown("normal");
            });

        }

        var show_detail = (obj) => {
            let key = $(obj).data('key');
            if (!$(obj).find('.data-content-body').is(":visible")) {
                $(obj).find('.data-content-body').slideDown('fast');
            } else {
                $(obj).find('.data-content-body').slideUp('fast');
            }
        }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>