$(function() {

    //$.ajax({
    //    type: "GET",
    //    url: "/datagrid"
    //}).done(function(countries) {
    //
    //    countries.unshift({ id: "0", name: "" });
    //
    //});
    var status = [{name: 'published'},{name:'drafted'}];
    status.unshift({name: ""});
    $("#jsGrid").jsGrid({
        //height: "70%",
        width: "100%",
        filtering: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        //deleteConfirm: "Do you really want to delete client?",
        controller: {
            loadData: function(filter) {
                return $.ajax({
                    type: "GET",
                    url: "/datagrid",
                    data: filter
                });
            },
            //insertItem: function(item) {
            //    return $.ajax({
            //        type: "POST",
            //        url: "/clients/",
            //        data: item
            //    });
            //},
            //updateItem: function(item) {
            //    return $.ajax({
            //        type: "PUT",
            //        url: "/clients/",
            //        data: item
            //    });
            //},
            //deleteItem: function(item) {
            //    return $.ajax({
            //        type: "DELETE",
            //        url: "/clients/",
            //        data: item
            //    });
            //}
        },
        fields: [
            { name: "title", title: "Title", type: "text", width: 150 },
            { name: "status", title: "Status", type: "select", items: status, valueField: "name", textField: "name", width: 30, align: "center",
                itemTemplate: function(value) {
                    if(value == 'published'){
                        return $('<span>').addClass('label label-success').append(value);
                    } else {
                        return $('<span>').addClass('label label-warning').append(value);
                    }
                }
            },
            { name: "id", type: "control",
                headerTemplate: function () {
                    return "header"
                },
                itemTemplate: function(value) {
                    var e = '<a href="#'+ value +'"><i class="fa fa-edit"></i></a>';
                    return $(e).on('click', function(){ console.log('hello') }).after('<a href="#"><i class="fa fa-trash"></i></a>');
                }
            }
        ]
    });

});