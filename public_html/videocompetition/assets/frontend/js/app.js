$(document).foundation();
$(function() {
  $('.btn-join').click(function(){
    $('#popup-daftar').addClass('popmuncul');
  });
  $('.close-btn').click(function(){
    $('#popup-daftar').removeClass('popmuncul');
    $('#popup-term').removeClass('popmuncul');
    $('#popberhasil').removeClass('popmuncul');
  });
  $('.btn-term').click(function(){
    $('#popup-term').addClass('popmuncul');
  });
  $('.btn-pilih').click(function(){
    form = $(this).attr('lang');
    if(form == 'copy'){
      $('.item-upload').html('Link Video <span>( Eg: https://www.youtube.com/watch?v=vpnPvNShpWQ )</span><input type="text" name="link" id="input-link" value="">');
      $('.btn-submit').attr('lang',form);
    }else if(form == 'upload'){
      $('.item-upload').html('Pilih Video<input type="file" name="video" id="input-file" value="">');
      $('.btn-submit').attr('lang',form);
    }
    $('#pilihan').hide();
    $('#form-video').show();
  });
  $('.btn-back').click(function(){
    $('#pilihan').show();
    $('#form-video').hide();
  });
  $('.btn-submit').click(function(){
    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if( emailReg.test( $email ) ) {
        return false;
      } else {
        return true;
      }
    }
    where = $(this).attr('lang');

    $('#form-video input').css('border','2px solid #2c3e50');
    $('#form-video input').css('box-shadow','none');
    $('#form-video textarea').css('border','2px solid #2c3e50');
    $('#form-video textarea').css('box-shadow','none');

    checkAkses = true;

    if($('#input-nama').val().trim() ==''){
      $('#input-nama').css('border','2px solid #a90c33');
      $('#input-nama').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    if($('#input-email').val().trim() ==''){
      $('#input-email').css('border','2px solid #a90c33');
      $('#input-email').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }else if(validateEmail($('#input-email').val().trim())) {
      $('#input-email').css('border','2px solid #a90c33');
      $('#input-email').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    if($('#input-telp').val().trim() ==''){
      $('#input-telp').css('border','2px solid #a90c33');
      $('#input-telp').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    else if(isNaN($('#input-telp').val().trim())){
      $('#input-telp').css('border','2px solid #a90c33');
      $('#input-telp').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    else if($('#input-telp').val().trim().charAt(0)!=0){
      $('#input-telp').css('border','2px solid #a90c33');
      $('#input-telp').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    if($('#input-judul').val().trim() ==''){
      $('#input-judul').css('border','2px solid #a90c33');
      $('#input-judul').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
      checkAkses = false;
    }
    if(where == 'copy'){
      if($('#input-link').val().trim() ==''){
        $('#input-link').css('border','2px solid #a90c33');
        $('#input-link').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
        checkAkses = false;
      } 
    }
    else if(where == 'upload'){
      if($('#input-file').val().trim() ==''){
        $('#input-file').css('border','2px solid #a90c33');
        $('#input-file').css('box-shadow','0px -6px 5px -6px #a90c33 inset');
        checkAkses = false;
      } 
    }
    if (checkAkses == true) {
      $('#wrap-loading').show();
      $('#form-video').submit();

    }
   
  });

  // $('form#form-video').submit(function(){
     
  //   var formData = new FormData($('form')[0]);
  
  //   $.ajax({
  //     url: urivideo,
  //     type: 'POST',
  //     data: formData,
  //     async: false, 
  //     success : function(data){
        
  //     }            
  //   });
  //   return false;
  // });
});
$(function() {
  $('#btn-start').click(function(){
    $('.line-btn').addClass('btn-tanya');
    $('#landing').hide('slow');
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

      $('#tanya-10').hide('medium'); 
      $('#result').show('medium'); 
      lasbanget = $('#hasil-option').val().slice(0,-1);
      $('#hasil-option').val(lasbanget);
    }else{
      lanjut = parseInt(pertanyaan[1])+1;
      $('#tanya-'+parseInt(pertanyaan[1])).hide('medium'); 
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
      $('#form-submit').submit();
    }
  });
  $('form#form-submit').submit(function(){
            
    
    var formData = $("#form-submit").serialize();
  
    $.ajax({
      url:uri,
      type: 'POST',
      data: formData,
      async: false, 
      success : function(e){
        e = $.parseJSON(e);
        
        if(e.status=="true"){
          $('#wrap-loading').hide();
          $('#personality').show();
          $('.txtnama').html(e.name);
          $('.pic-personality').html(e.pic);
          $('.wrap-txt-hasil').html(e.personality);

          $('#id-twit').attr('onClick',"window.open('https://twitter.com/intent/tweet?text=Tipe kepribadian saya dalam menangani bekas luka adalah "+e.txthasil+".&url=http://goo.gl/UrfHJI&hashtags=scarpersonality&via=ScarGuru');");
        }
      }            
    });
    return false;
  });
});
