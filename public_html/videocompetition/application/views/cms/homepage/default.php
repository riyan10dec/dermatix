<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/typeahead/typeahead.css')?>">
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
            <div class="row margin-bottom-10">
              <input name="form" type="hidden" value="1">
              <input name="old_pic" type="hidden" value="<?=$row['pic']?>">
              <input name="old_pic2" type="hidden" value="<?=$row['pic2']?>">
              
              
              <div class="col-md-8 lebarwidth">
                <h4 class="page-title">Landscape Size</h4>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail lebarpic">
                    <img src="<?=base_url('assets/images/homepage/'.$row['pic'])?>" alt=""/>
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail lebarpic">
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
                  <div class="clearfix margin-top-10">
                    <span class="label label-danger" style="margin-right:10px">
                    <b>Size Suggestion</b></span>
                    Width: 1366px | Height: 699px
                  </div>
                </div>
              </div>
              <div class="col-md-4 lebarwidth2">
                <h4 class="page-title">Portrait Size</h4>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail lebarpic2">
                    <img src="<?=base_url('assets/images/homepage/'.$row['pic2'])?>" alt=""/>
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail lebarpic2">
                  </div>
                  <div>
                    <span class="btn blue btn-file">
                      <span class="fileinput-new">
                      Select image </span>
                      <span class="fileinput-exists">
                      Change </span>
                      <input type="file" name="pic2">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                    Remove </a>
                  </div>
                  <div class="clearfix margin-top-10">
                    <span class="label label-danger" style="margin-right:10px">
                    <b>Size Suggestion</b></span>
                    Width: 593px | Height: 850px
                  </div>
                </div>
              </div>
              <div class="col-md-12 margin-top-20">
                <div class="noborder">
                  <button class="btn green" name='submit' value="submit">Submit</button>
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

    var lebihdiv = $('.lebarwidth').width();
    $('.lebarpic').css('max-width',lebihdiv);
    var lebihdiv2 = $('.lebarwidth2').width();
    $('.lebarpic2').css('max-width',lebihdiv2);
  });
</script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>
<script src="<?=base_url('assets/backend/global/plugins/moment/moment.js')?>"></script>