<script>
    var cname = "<?php echo $cname ?>";
    var table_data;
    $(function() {
        table_data = $('#table-data').DataTable({
            'ajax': {
                'url': $('#table-data').data('url')
            },
            'columns': [{
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
                    "width": "79px",
                    'data': (data) => {
                        let ret = "";
                        ret += '<div class="btn-group">';
                        ret += '<a type="a" class="btn btn-xs btn-flat text-success"><i class="fa fa-pencil"></i> Edit</a>';
                        ret += '<a href="javascript:void(0)" onclick="delete_prompt(this)" class="btn btn-xs btn-flat text-danger" data-id="'+data.id+'"><i class="fa fa-trash"></i> Hapus</a>';
                        ret += '</div>';
                        return ret;
                    }
                },
                {
                    'title': 'Username',
                    'data': 'username'
                }
            ]
        });
    })

    var delete_prompt = (btnObject) => {
        let id = $(btnObject).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url : base_url+"/"+cname+"/action_delete",
                    type : 'POST',
                    data : {
                        id : id
                    },
                    dataType : 'JSON',
                    success: (data) => {
                        Swal.fire(
                            data.title,
                            data.message,
                            data.type
                        )
                        table_data.ajax.reload(null, false);
                    }
                });
            }
        })
    }
</script>