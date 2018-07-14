<div id="dataGrid"></div>

<script>
    $(function() {
        var status = [{name: 'published'},{name:'drafted'}];
        status.unshift({name: ""});
        $("#dataGrid").jsGrid({
            @foreach ($options as $k => $o)
                {{ json_encode($k) }}: {{ json_encode($o) }},
            @endforeach
            confirmDeleting: false,
            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET",
                        url: "{{ Request::getUri() }}",
                        data: filter
                    });
                },
            },
            fields: [
                @foreach ($fields as $field)
                    @if(isset($field['name']) and $field['name'] == 'status')
                        {   name: "{{ $field['name'] }}",
                            title: "{{ $field['title'] }}",
                            type: "select",
                            items: status,
                            valueField: "name",
                            textField: "name",
                            width: "{{ $field['width'] }}",
                            align: "{{ $field['align'] }}",
                            itemTemplate: function(value) {
                                if(value == 'published'){
                                    return $('<span>').addClass('label label-success').append(value);
                                } else {
                                    return $('<span>').addClass('label label-warning').append(value);
                                }
                            }
                        },
                    @elseif($field['type'] == 'control')
                        {   name: "id",
                            type: "control",
                            headerTemplate: function () {
                                return "{{ $field['title'] }}"
                            },
                            itemTemplate: function(value, item) {
                                var control = '';
                                var vars = {};
                                var trash = "{{ Input::get('trash') }}";
                                if(strpos("{{ $field['actions'] }}", '|') === false){
                                    vars["{{ $field['actions'] }}"] = true;
                                } else {
                                    var names = "{{ $field['actions'] }}";
                                    $.each(names.split("|"), function(i, action){
                                        vars[action] = true;
                                    });
                                }
                                if(trash) {
                                    control += '<a href="{{ URL::to($field['url']) }}/'+ value +'/delete?restore=true" class="action restore deleteOrRestore" title="Restore"><i class="fa fa-refresh"></i></a>';
                                } else {
                                    if(vars['show']) {
                                        control += '<a href="{{ URL::to($field['url']) }}/'+ value +'" class="action show" title="Show"><i class="fa fa-eye"></i></a>';
                                    }
                                    if(vars['modify']) {
                                        control += '<a href="{{ URL::to($field['url']) }}/'+ value +'/edit" class="action modify" title="Edit"><i class="fa fa-edit"></i></a>';
                                    }
                                    if(vars['delete']) {
                                        control += '<a href="{{ URL::to($field['url']) }}/'+ value +'/delete" class="action delete deleteOrRestore" title="Delete"><i class="fa fa-trash"></i></a>';
                                    }
                                }

                                return control;
                            }
                        },
                    @else
                    {{ json_encode($field) }},
                    @endif
                @endforeach
            ]
        });
        function strpos(haystack, needle, offset) {
            var i = (haystack + '')
                    .indexOf(needle, (offset || 0));
            return i === -1 ? false : i;
        }

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
