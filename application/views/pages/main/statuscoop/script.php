<script>
    var cname = "<?php echo $cname ?>";
    var lg_username = "<?php echo $this->session->userdata('lg_username') ?>";
    var table_data;
    $(document).ready(function() {

        $('#table-data thead tr').clone(true).appendTo('#table-data thead');
        $('#table-data thead tr:eq(1) th').each(function(i) {
            if ($(this).data('filter') == "text") {
                $(this).html('<input type="text" placeholder="Search" class="form-control" style="width:100%"/>');
                $('input', this).on('keyup change', function() {
                    if (table_data.column(i).search() !== this.value) {
                        table_data
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            }
        });
        table_data = $('#table-data').DataTable({
            orderCellsTop: true,
            'ajax': {
                'url': $('#table-data').data('url')
            },
            "order": [
                [1, "asc"]
            ],
            dom: '<"pull-left"<"pull-right ml-1"l>B>fr<"table-responsive"t>ip',
            buttons: [{
                    text: '<i class="fa fa-plus"></i> Tambah',
                    className: 'btn btn-sm btn-primary',
                    action: function(e, dt, node, config) {
                        create_prompt(node);
                    }
                },
                {
                    text: '<i class="fa fa-trash"></i> Hapus semua',
                    className: 'btn btn-sm btn-danger',
                    action: function(e, dt, node, config) {
                        if ($('.check:checked').length) {
                            delete_prompt(node);
                        } else {
                            Swal.fire(
                                'Information',
                                'Tidak ada baris yang dicentang',
                                'info'
                            );
                        }
                    }
                }
            ],
            'columns': [{
                    'title': '<input type="checkbox" name="r1" id="check-all">',
                    "width": "15px",
                    'orderable': false,
                    'data': (data) => {
                        let ret = "";
                        ret += '<input type="checkbox" name="select[]" class="check" value="' + data.id + '">';
                        return ret;
                    }
                },
                {
                    "title": "No",
                    "width": "15px",
                    "data": null,
                    "visible": true,
                    "class": "text-center",
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'title': '',
                    "width": "170px",
                    'data': (data) => {
                        let ret = "";

                        ret += '<div class="btn-group">';
                        ret += '<button type="button" onclick="change_status(this)" data-id="' + data.id + '" data-status="2" class="btn btn-sm btn-change-status ' + (data.status == '2' ? "btn-primary" : "btn-default") + '">Left</button>';
                        ret += '<button type="button" onclick="change_status(this)" data-id="' + data.id + '" data-status="0" class="btn btn-sm btn-change-status ' + (data.status == '0' ? "btn-primary" : "btn-default") + '">Middle</button>';
                        ret += '<button type="button" onclick="change_status(this)" data-id="' + data.id + '" data-status="1" class="btn btn-sm btn-change-status ' + (data.status == '1' ? "btn-primary" : "btn-default") + '">Right</button>';
                        ret += '</div>';
                        return ret;
                    }
                },
                {
                    'title': 'Nama Perusahaan',
                    'data': 'company_name'
                },
                {
                    'title': 'Alamat Perusahaan',
                    'data': 'company_address'
                },
                {
                    'title': 'No',
                    'data': 'coop_number'
                },
                {
                    'title': 'Deskripsi',
                    'data': 'description'
                },
                {
                    'title': 'Tanggal Mulai',
                    'data': 'start_date'
                },
                {
                    'title': 'Tanggal Selesai',
                    'data': 'end_date'
                },
                {
                    'title': 'Jenis Kerjasama',
                    'data': 'coop_type_name'
                }
            ],
            "fnInitComplete": function(oSettings) {
                $('#check-all').click(function() {
                    if ($('#check-all').is(':checked')) {
                        $('.check').prop('checked', true);
                    } else {
                        $('.check').prop('checked', false);
                    }
                });
            }
        });
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