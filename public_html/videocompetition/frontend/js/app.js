$(document).foundation();

$(function() {
  $('#btn-start').click(function(){
    $('.line-btn').addClass('btn-tanya');
    $('#tanya-1').show('slow');
  });
  $('#hasil-option').val('');
  $('.email-user').val('');
  $('.name-user').val('');
  $('.item-choice').click(function(){

    option = $(this).attr('data-option');
    hasiloption = $('#hasil-option').val();
    hasilakhir = hasiloption+option+',';
    $('#hasil-option').val(hasilakhir);

    pertanyaan = $(this).parent().parent().parent().parent().attr('id').split('-');
    if(pertanyaan[1] == 10){
      $('.line-btn').removeClass('btn-tanya');
      $('#result').show('medium'); 
      lasbanget = $('#hasil-option').val().slice(0,-1);
      console.log(lasbanget);
    }else{
      lanjut = parseInt(pertanyaan[1])+1;
      $('#tanya-'+lanjut).show('medium'); 
    }
  });
  $('#btn-result').click(function(){
    var nama = $('#name-user').val().trim();
    var email = $('#email-user').val().trim();
    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if( emailReg.test( $email ) ) {
        return false;
      } else {
        return true;
      }
    }  

    $('#form-submit input').css('border-bottom','3px solid #f7a44b');
    $('#form-submit input').css('box-shadow','none');
    
    if($('#name-user').val().trim() ==''){
      $('#name-user').css('border-bottom','3px solid #a90c33');
      $('#name-user').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
    }
     if($('#email-user').val().trim() ==''){
      $('#email-user').css('border-bottom','3px solid #a90c33');
      $('#email-user').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
    }else if(validateEmail(email)) {
      $('#email-user').css('border-bottom','3px solid #a90c33');
      $('#email-user').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
    }
    if(nama != '' && email != '' && !validateEmail(email)){
      $('#wrap-loading').show();
      $('#form-contact').submit();
    //alert('hiii')
    }else{
      alert('asd');
    }
  });
  // $('form#form-submit').submit(function(){
            
  //   var uri = "<?=base_url('saveform')?>";
  //   var formData = $("#form-submit").serialize();
  
  //   $.ajax({
  //     url:uri,
  //     type: 'POST',
  //     data: formData,
  //     async: false,             
  //     success: function (data) {
  //       if(data==1){
  //         $('#wrap-loading').hide();
  //         $(".input-contact").val('');
  //         $('#wrap-popup').show();
  //         $('.txt-pop').html('Pertanyaan anda sudah di upload, silahkan tunggu di jawab (test copy)');
  //       }else{
  //         $('#wrap-loading').hide();
  //         $(".input-contact").val('');
  //         $('#wrap-popup').show();
  //         $('.txt-pop').html('Maaf Terjadi Kesalahan Silahkan Mencoba Lagi');
  //       }
  //     }
  //   });
  //   return false;
  // });
});