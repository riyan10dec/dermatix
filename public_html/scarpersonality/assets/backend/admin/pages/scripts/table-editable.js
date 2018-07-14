var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
          var aData = oTable.fnGetData(nRow);
          var jqTds = $('>td', nRow);
          jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
          jqTds[1].innerHTML = '<a class="edit" href="">Save</a>';
          jqTds[2].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
          var jqInputs = $('input', nRow);
          oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
          oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 1, false);
          oTable.fnUpdate('<a class="trash" href="">Move to Trash</a>', nRow, 2, false);
          oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
          var jqInputs = $('input', nRow);
          oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
          oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 1, false);
          oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.trash', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to Move to Trash this row ?") == false) {
                return;
            }



            var nRow = $(this).parents('tr')[0];
            
            var jqTable = $('tbody', nRow);
            Tabledb = jqTable['context']['parentElement'].lang;

            var jqItem = $('tr', nRow);
            Iddb = jqItem['context'].lang;

            // oTable.fnDeleteRow(nRow);
            $.ajax({
              type        : 'POST',
              data        : {'id' : Iddb, 'table' : Tabledb, 'status' : 'trash'},
              dataType    : 'json',
              url        : uri,
              success: function (data){
                oTable.fnDeleteRow(nRow);
                oldPublish = $('#jml_publish').html();
                oldTrash   = $('#jml_trash').html();
                newPublish = parseInt(oldPublish) - 1;
                newTrash   = parseInt(oldTrash) + 1;

                $('#jml_publish').html(newPublish);
                $('#jml_trash').html(newTrash);

              },
              async: false
            });
            //location.reload();
        });
        
        table.on('click', '.restore', function (e) {
            e.preventDefault();

            var nRow = $(this).parents('tr')[0];
            
            var jqTable = $('tbody', nRow);
            Tabledb = jqTable['context']['parentElement'].lang;

            var jqItem = $('tr', nRow);
            Iddb = jqItem['context'].lang;

            // oTable.fnDeleteRow(nRow);
            $.ajax({
              type        : 'POST',
              data        : {'id' : Iddb, 'table' : Tabledb, 'status' : 'restore'},
              dataType    : 'json',
              url        : uri,
              success: function (data){
                oTable.fnDeleteRow(nRow);
                oldPublish = $('#jml_publish').html();
                oldTrash   = $('#jml_trash').html();
                newPublish = parseInt(oldPublish) + 1;
                newTrash   = parseInt(oldTrash) - 1;

                $('#jml_publish').html(newPublish);
                $('#jml_trash').html(newTrash);

              },
              async: false
            });
            //location.reload();
        });
        
        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to Delete Permanently this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            
            var jqTable = $('tbody', nRow);
            Tabledb = jqTable['context']['parentElement'].lang;

            var jqItem = $('tr', nRow);
            Iddb = jqItem['context'].lang;

            // oTable.fnDeleteRow(nRow);
            $.ajax({
              type        : 'POST',
              data        : {'id' : Iddb, 'table' : Tabledb, 'status' : 'delete'},
              dataType    : 'json',
              url        : uri,
              success: function (data){
                oTable.fnDeleteRow(nRow);
                oldTrash   = $('#jml_trash').html();
                newTrash   = parseInt(oldTrash) - 1;

                $('#jml_trash').html(newTrash);

              },
              async: false
            });
            //location.reload();
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
              var jqInputs = $('input', nRow);
              var jqTable = $('tbody', nRow);

              Tabledb = jqTable['context']['parentElement'].lang;
              Titledb = jqInputs[0].value;
              if(jqInputs[0].value != ""){
                
                var aData = oTable.fnGetData(nRow);
                //console.log(jqTable);
                
                if(aData[0]){

                  var jqItem = $('tr', nRow);
                  Iddb = jqItem['context'].lang;

                  $.ajax({
                    type        : 'POST',
                    data        : {'id' : Iddb, 'title' : Titledb, 'table' : Tabledb, 'status' : 'update'},
                    dataType    : 'json',
                    url        : uri,
                    success: function (data){
                      saveRow(oTable, nEditing);
                      nEditing = null;
                    },
                    async: false
                  });
                }else{

                  $.ajax({
                    type        : 'POST',
                    data        : { 'title' : Titledb, 'table': Tabledb, 'status': 'save'},
                    dataType    : 'json',
                    url        : uri,
                    async: false,
                    success: function (data){
                      saveRow(oTable, nEditing);
                      nEditing = null;
                      location.reload();
                    }
                  });

                }
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
              }else{
                alert("Title : Must be filled<");
              }

            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();