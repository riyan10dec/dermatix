{{ Theme::partial('action-bar') }}

<div id="dataGrid"></div>

<script>
    $(function() {
        var status = [{name: 'published'},{name:'drafted'}];
        status.unshift({name: ""});

        $("#dataGrid").jsGrid({
            width: "100%",
            filtering: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            confirmDeleting: false,
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "{{ Request::getUri() }}",
                        data: filter
                    });
                }
            },
            fields: [
                { name: "title", title: "Title", type: "text", width: 150 },
                { name: "type", title: "Type", type: "text" },

                { name: "type", title: "Type", type: "text" },
                { name: "updated_at", title: "Last Update", type: "date", width:50, align:"center" },
                {   name: "status",
                    title: "Status",
                    type: "select",
                    items: status,
                    valueField: "name",
                    textField: "name",
                    width: "50",
                    align: "center",
                    itemTemplate: function(value) {
                        if(value == 'published'){
                            return $('<span>').addClass('label label-success').append(value);
                        } else {
                            return $('<span>').addClass('label label-warning').append(value);
                        }
                    }
                },
                {   name: "id",
                    type: "control",
                    headerTemplate: function () {
                        return "Control"
                    },
                    itemTemplate: function(value, item) {
                        var control = '';
                        var trash = "{{ Input::get('trash') }}";
                        if(trash) {
                            control += '<a href="{{ URL::to('admin/'.Request::segment(2)) }}/'+ value +'/delete?restore=true" class="action restore deleteOrRestore" title="Restore"><i class="fa fa-refresh"></i></a>';
                        } else {
                            control += '<a href="{{ URL::to('admin/'.Request::segment(2)) }}/'+ value +'/edit" class="action modify" title="Edit"><i class="fa fa-edit"></i></a>';
                            control += '<a href="{{ URL::to('admin/'.Request::segment(2)) }}/'+ value +'/delete" class="action delete deleteOrRestore" title="Delete"><i class="fa fa-trash"></i></a>';
                        }

                        return control;
                    }
                }
            ]
        });

        $("#dataGrid").on('click', '.deleteOrRestore', function(e){
            e.preventDefault();
            var url = $(this).attr('href'),
                    item = $(this).parent().parent(),
                    text = '',
                    title = '',
                    messageConfirm = '',
                    messageCancel = '';
            if($(this).hasClass('restore')){
                text = "You will restore this record!";
                title = 'Restored!';
                messageConfirm = 'This record has been restored.';
                messageCancel = 'This record keep in trash.';
            } else {
                text = "You will delete this record!";
                title = 'Deleted!';
                messageConfirm = 'This record has been deleted.';
                messageCancel = 'This record is safe :)';
            }
            swal({
                title: "Are you sure?",
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff382b",
                confirmButtonText: "Yes, do it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        method: 'POST',
                        url: url,
                        success: function(data){
                            var $grid = $("#dataGrid");

                            $grid.jsGrid("deleteItem", item);

                            swal(title, messageConfirm, "success");
                        }
                    });
                } else {
                    swal("Cancelled", messageCancel, "error");
                }
            });
        });
    });
</script>