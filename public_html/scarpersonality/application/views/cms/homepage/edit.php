<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/typeahead/typeahead.css')?>">
<link media="all" type="text/css" rel="stylesheet" href="<?=base_url('assets/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')?>">

<link media="all" type="text/css" rel="stylesheet" href="<?=base_url('assets/backend/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')?>">

<link media="all" type="text/css" rel="stylesheet" href="<?=base_url('assets/backend/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')?>">
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Edit Landing Page Picture
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-body form">
        <form role="form" method="POST" action="" enctype="multipart/form-data">
          <div class="form-body">
            <?php
            if (isset($status)) {
             if ($status['success'] == true) {
            ?>
              <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                Data has been saved!
              </div>
            <?php
              } else {
            ?>
              <div class="alert alert-danger ">
                <button class="close" data-close="alert"></button>
                Data not saved. Please check field.
                <ul>
                  <?=$status['notice']?>
                </ul>
              </div>
              <?php
              }
            }
            ?>
            <div class="row">
              <div class="col-md-8">
                <div class="row margin-bottom-10">
                  <input name="form" type="hidden" value="1">
                  <input name="picold" type="hidden" value="<?=$row['pic']?>">
                  <div class="col-md-12">
                    <?php
                    if(isset($status['form']['title']) AND $status['form']['title'] != ""){
                      $valuetitle = $status['form']['title'];
                      $classtitle = "edited";
                    }else{
                      $valuetitle = $row['title'];
                      $classtitle = 'edited';
                    }
                    ?>
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <input type="text" name="title" value="<?=$valuetitle?>" class="form-control <?=$classtitle?>" id="form_control_1">
                      <label for="form_control_1">Title Landing Picture</label>
                      <span class="help-block">Untuk Membesarkan Tulisan dengan menggunakan tag '<?=htmlspecialchars('<b>')?>' contoh: <?=htmlspecialchars('<b>WE ARE</b>')?></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <?php
                    if(isset($status['form']['subtitle']) AND $status['form']['subtitle'] != ""){
                      $valuesubtitle = $status['form']['subtitle'];
                      $classsubtitle = "edited";
                    }else{
                      $valuesubtitle = $row['subtitle'];
                      if ($row['subtitle'] != ""){
                        $classsubtitle = 'edited';
                      }else{
                        $classsubtitle = '';
                      }
                    }
                    ?>
                    <div class="form-group form-md-line-input">
                      <textarea name="subtitle" class="form-control <?=$classsubtitle?>" rows="2" placeholder="Enter Subtitle"><?=$valuesubtitle?></textarea>
                      <div class="form-control-focus">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 lebarwidth">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail pic-exist">
                        <?php if ($row['pic'] != ""): ?>
                        <img src="<?=base_url('assets/backend/images/landing/'.$row['pic'])?>" alt=""/>
                        <?php else: ?>
                        <img src="http://www.placehold.it/400x225/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                        <?php endif ?>
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail">
                      </div>
                      <div>
                        <span class="btn blue btn-file">
                          <span class="fileinput-new">
                          Select image </span>
                          <span class="fileinput-exists">
                          Change </span>
                          <input type="file" name="pic">
                        </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                        Remove </a>
                      </div>
                    </div>
                    <div class="clearfix margin-top-10">
                      <span class="label label-danger" style="margin-right:10px">
                      <b>Size Suggestion</b></span>
                      Width: 1366px | Height: 665px
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <?php
                if($row['draft'] == 1){
                  $txtstatus = 'Draft';
                  $classstatus = 'alert-warning';
                }else{
                  $txtstatus = 'Publish';
                  $classstatus = 'alert-success';
                }
                ?>
                <div class="alert <?=$classstatus?>">
                <div class="margin-bottom-10">Status : <strong><?=$txtstatus?></strong></div>
                
                </div>
                <div class="noborder">
                  <button class="btn green" name='submit' value="submit">Submit</button>
                  <a href="<?=base_url('webadmin/landing')?>" class="btn default">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>
<!-- END PAGE CONTENT-->

<script>
  $('body').addClass('page-sidebar-closed','page-sidebar-closed-hide-logo');
  $('ul.page-sidebar-menu').addClass('page-sidebar-menu-closed');

  $( document ).ready(function() {

    function ShowStartDate(){
      
      var tanggal = $('#start-date-input').val();

      if(tanggal != ''){
        return tanggal;
      }else{
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
        //$('#currentDate').text(localdate);
        return localdate;
      }

      
    }

    var sekarangstart = ShowStartDate();

    $('#start-date-input').val(sekarangstart);
    var lebihdiv = $('.lebarwidth').width();
    $('.fileinput-preview').css('max-width',lebihdiv);
    $('.pic-exist').css('max-width',lebihdiv);

    $('#timepick-start').css('display','none');
    $('#btn-time-start').on('click', function(){
      $('#timepick-start').slideDown();
    });
    $('#date-reset-start').on('click', function(){
      $('#wrap-tgl-start').html(sekarangstart);
      $('#start-date-input').val(sekarangstart);
      $('#timepick-start').slideUp();
    });
    $('#date-finish-start').on('click', function(){
      $('#timepick-start').slideUp();
      var hasiltgl = $('#start-date-input').val();
      $('#wrap-tgl-start').html(hasiltgl);

    });

    var tanggalend = $('#end-date-input').val();

    $('#timepick-end').css('display','none');

    $('#btn-time-end').on('click', function(){
      if(tanggalend == '9999-12-31 23:59:59'){
        $('#end-date-input').val('');
      }
      $('#timepick-end').slideDown();
    });

    $('#date-reset-end').on('click', function(){
      $('#timepick-end').slideUp();
      if(tanggalend == '9999-12-31 23:59:59'){
        $('#wrap-tgl-end').html('Always');
      }else{
        $('#wrap-tgl-end').html(tanggalend);
      }
      $('#end-date-input').val(tanggalend);
    });
    $('#date-finish-end').on('click', function(){
      $('#timepick-end').slideUp();
      var hasiltgl = $('#end-date-input').val();
      $('#wrap-tgl-end').html(hasiltgl);
    });
    $('#date-always-end').on('click', function(){
      $('#timepick-end').slideUp();
      $('#end-date-input').val('');
      $('#wrap-tgl-end').html('Always');
    });

  });
</script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>
<script src="<?=base_url('assets/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<script src="<?=base_url('assets/backend/global/plugins/moment/moment.js')?>"></script>

<script src="<?=base_url('assets/backend/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>

<script type="text/javascript">
  $(function () {
    $('.datetimepicker4').datetimepicker({
      sideBySide: true,
      use24hours: true,
      minDate: moment(),
      format : 'YYYY-MM-DD HH:mm'
    });
  });
</script>