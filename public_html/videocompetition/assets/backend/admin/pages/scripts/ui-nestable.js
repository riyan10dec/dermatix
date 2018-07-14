 var UINestable = function () {

    $(".dd-nodrag").on("mousedown", function(event) { // mousedown prevent nestable click
      event.preventDefault();
      return false;
    });
    
    var updateOutput = function (e) {
        var table = $('.dd').attr('lang');
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            //output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            output = window.JSON.stringify(list.nestable('serialize'));
        } else {
            output = 'JSON browser support required for this demo.';
        }

        $.ajax({
          type        : 'POST',
          data        : { 'id' : output, 'table': table},
          dataType    : 'json',
          url        : uri
        });

        //alert(output);
    };


    return {
        //main function to initiate the module
        init: function () {
            
            // activate Nestable for list 1
            $('#nestable_list_1').nestable({
                group: 1
            })
                .on('change', updateOutput);

            // output initial serialised data
            //updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));

            $('#nestable_list_menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

        }

    };

}();