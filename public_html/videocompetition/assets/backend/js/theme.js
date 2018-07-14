var form = $("#form-register");

var container = $('#alert');

form.validate({

    errorContainer: container,

    errorLabelContainer: $("ol", container),

    wrapper: 'li',

    errorPlacement: function errorPlacement(error, element) { $('#alert').hide().append(error).fadeIn(); },

    rules: {

        email: {

            required: true,

            email: true,

            remote: {

                url: "/validate/email",

                type: "post"

            }

        },

        password: {

            required: true,

            minlength: 6

        },

        confirm: {

            equalTo: "#password"

        }

    },

    messages: {

        competition_type: "Please select one.",

        competition_city: "Please select one of the cities.",

        full_name: "Full Name is required",

        nickname: "Nickname is required",

        birthday_y: "Year of birth is required",

        birthday_m: "Month of birth is required",

        birthday_d: "Date of birth is required",

        email: {

            required: "Please enter your email.",

            email: "Please enter a valid email.",

            remote:"Email already exist."

        },

        phone: "Phone Number is required",

        current_city: "Current City is required",

        gender: "Gender is required",

        password: {

            required: "Password is required",

            minlength: "Please enter at least 6 characters.",

        },

        confirm: {

            required: "Confirm Password is required",

            equalTo: "Please enter password the same value again."

        },

        agree: "Please accept the term & condition.",

    }

});

form.children(".form-content").children('#steps').steps({

    headerTag: "h3",

    bodyTag: "section",

    transitionEffect: "slideLeft",

    onStepChanging: function (event, currentIndex, newIndex)

    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18)
        {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();

    },

    onFinishing: function (event, currentIndex)

    {

        form.validate().settings.ignore = ":disabled";

        return form.valid();

    },

    onFinished: function (event, currentIndex)

    {      

        var type = $("input[name='competition_type']:checked").val(),

            cities = $("input[id='competition_city']:checked").map(function(){return $(this).val();}).get(),

            fullName = $("input[name='full_name']").val(),

            nickName = $("input[name='nickname']").val(),

            birthdayY = $("select[name='birthday_y']").val(),

            birthdayM = $("select[name='birthday_m']").val(),

            birthdayD = $("select[name='birthday_d']").val(),

            email = $("input[name='email']").val(),

            phone = $("input[name='phone']").val(),

            currentCity = $("select[name='current_city'] option:selected").text(),

            gender = $("select[name='gender']").val();





            $('#competitionType').text(type);

            $('#competitionCity').text(cities);

            $('#fullName').text(fullName);

            $('#nickName').text(nickName);

            $('#birthday').text(birthdayY+'-'+birthdayM+'-'+birthdayD);

            $('#email').text(email);

            $('#phone').text(phone);

            $('#currentCity').text(currentCity);

            $('#gender').text(gender);



        $.magnificPopup.open({

            items: {

                src: '#popup-block'

            },

            type: 'inline',

            preloader: false



          // You may add options here, they're exactly the same as for $.fn.magnificPopup call

          // Note that some settings that rely on click event (like disableOn or midClick) will not work here

        }, 0);

        

    }

});



$(function() {    

    $('#submit').on('click', function(e){

        e.preventDefault();



        var $url = form.attr('action'),

            $data = form.serializeArray(),

            $formData = new FormData(),

            $fileData = $('#profilePicture').prop('files')[0];



        $('#loader').fadeIn();

        $formData.append('profile_picture', $fileData);

        $data.forEach(function(field){

            $formData.append(field.name, field.value);

        });

        $.ajax({

            type: "POST",

            url: $url,

            data: $formData,

            contentType: false,

            processData: false,

            success: function (responseText) {

                console.log(responseText);

                $('#loader').fadeOut();

                $('#steps').removeClass('begin').addClass('close');

                $('#thanks').addClass('appear');

                $.magnificPopup.close();

            },

            error: function ( jqXHR, textStatus, errorThrown) {

                console.log(jqXHR.responseText);

                $('#loader').fadeOut();

                //$('#alertError').hide().text(jqXHR.responseText).fadeIn();

            }

        });

    });  

    $('#register').on('click', function(e){

        e.preventDefault();



        $('#form').addClass('expand');

    });



    // $('.competition a').on('click', function(e){

    //      e.preventDefault();



    //      $(this).toggleClass('active');



    //      if($(this).hasClass('active')){

    //         $(this).parent().find('input').prop('checked', true); // Checks it

    //      } else {

    //         $(this).parent().find('input').prop('checked', false); 

    //      }



    //      var val = $(this).attr('id');

    //      $('#type').val(val);

    // });



    $('.competition a').on('click', function(e){

         e.preventDefault();



         $('.competition a').each(function(){

            $(this).removeClass('active');

         });



          $(this).addClass('active');



         var val = $(this).attr('id');

         $('#competition_type').val(val);

    });



    $('.close-form').on('click', function(e){

        e.preventDefault();



        $('#form').removeClass('expand');

    });





    $('#resendRegCodeForm form').validate({

        errorContainer: container,

        errorPlacement: function errorPlacement(error, element) { $('#alertError').hide().html(error).fadeIn(); },

        rules: {

            email: {

                required: true,

                email: true

            }

        },

        messages: {

            email: {

                required: "Please enter your email.",

                email: "Please enter a valid email."

            }

        },

        submitHandler: function (form) {

            var $form = $(form),

                $url = $form.attr('action'),

                $data = $form.serialize();



            $('#loader').fadeIn();

            $('#alertSuccess, #alertError').fadeOut();

            $.ajax({

                type: "POST",

                url: $url,

                data: $data,

                success: function (responseText) {

                    $('#loader').fadeOut();

                    $('#alertSuccess').hide().text(responseText).fadeIn();

                },

                error: function ( jqXHR, textStatus, errorThrown) {

                    $('#loader').fadeOut();

                    $('#alertError').hide().text(jqXHR.responseText).fadeIn();

                }

            });

            return false; // required to block normal submit since you used ajax

        }

    });




    $('#regCode').on('keypress', function(e){

        if(e.which == 13) {

            $('#loader').fadeIn();

            var $venue = $('#venue').val();

            $.ajax({

                type: "POST",

                url: '/users/venue-register',

                data: {venue: $venue, regCode: $(this).val()},

                success: function (response) {

                    var pf = response.profile_picture;

                    if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(pf)) {

                        response.profile_picture = 'profile.png';

                    }

                    response.attend_malang = Boolean(response.attend_malang);

                    response.attend_kediri = Boolean(response.attend_kediri);

                    response.attend_yogya = Boolean(response.attend_yogya);

                    response.attend_bandung = Boolean(response.attend_bandung);

                    response.attend_tangerang = Boolean(response.attend_tangerang);

                    console.log(response);

                    $('#loader').fadeOut();

                    var template = $('#template').html();

                    Mustache.parse(template);   // optional, speeds up future uses

                    var rendered = Mustache.render(template, response);

                    $('#target').hide().html(rendered).fadeIn('slow');

                },

                error: function (jqXHR, textStatus, errorThrown) {

                    console.log(jqXHR);

                    $('#loader').fadeOut();

                    $('#target').hide().html('<h3 class="text-center">'+jqXHR.responseJSON+'</h3>').fadeIn('slow');

                }

            });

        }

    });



    $('.result-user').on('click', '#attend', function(e){

        e.preventDefault();

        $('#loader').fadeIn();

        var $venue = $('#venue').val();

        var $userID = $('.result-user').find('#userID').val();

        $.ajax({

            type: "POST",

            url: '/users/venue-register/attend',

            data: {venue: $venue, userID: $userID},

            success: function (response) {

                console.log(response);

                $('#loader').fadeOut();

                $('#alert').hide().html(response).fadeIn();

            },

            error: function (jqXHR, textStatus, errorThrown) {

                console.log(jqXHR);

                $('#loader').fadeOut();

                $('#target').hide().html(jqXHR.responseJSON).fadeIn();

            }

        });

    });



    $("[data-scroll-to]").click(function() {

        var el = $(this).data('to');

        $('html, body').animate({

            scrollTop: $(el).offset().top

        }, 2000);

    });



});



$(document).ready(function() {

    var stickyNavTop = $('nav.navbar').offset().top;



    var stickyNav = function(){

        var scrollTop = $(window).scrollTop();



        if (scrollTop > stickyNavTop) {

            $('nav.navbar').addClass('sticky');

        } else {

            $('nav.navbar').removeClass('sticky');

        }

    };



    stickyNav();



    $(window).scroll(function() {

        stickyNav();

    });

});



$(function() {   

    $("[data-input-number]").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||

                // Allow: Ctrl+A

            (e.keyCode == 65 && e.ctrlKey === true) ||

                // Allow: home, end, left, right, down, up

            (e.keyCode >= 35 && e.keyCode <= 40)) {

            // let it happen, don't do anything

            return;

        }

        // Ensure that it is a number and stop the keypress

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

            e.preventDefault();

        }

    });

    $( "[data-input-date]" ).datepicker({

        format: "yyyy-mm-dd",

        endDate: "1996-12-31"

    });



        $(".fancybox").fancybox();

        $(".fancybox-thumb").fancybox({
            prevEffect  : 'none',
            nextEffect  : 'none',
            helpers : {
                title   : {
                    type: 'outside'
                },
                thumbs  : {
                    width   : 50,
                    height  : 50
                }
            }
        });

});

