<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/typeahead/typeahead.css')?>">
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
            <!-- <div class="alert alert-warning">
                Status : <strong>Draft</strong>
              </div> -->
            <div class="row">
              <div class="col-md-12">
                <div class="row margin-bottom-10">
                  <input name="form" type="hidden" value="1">
                  <div class="col-md-12">
                    
                    
                    <?php
                    if(isset($status['form']['isi']) AND $status['form']['isi'] != ""){
                      $valueisi = $status['form']['isi'];
                    }else{
                      $valueisi = $rec['isi'];
                    }
                    ?>
                    <div class="form-group">
                      <textarea name="isi" rows="25"><?=$valueisi?></textarea>
                    </div>
                    <?php if ($permit->isupdate == 1): ?>
                    <div class="noborder">
                      <button class="btn green" name='publish'>Save</button>
                    </div>
                    <?php endif ?>
                  </div>
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
</script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>

<script src="<?=base_url('assets/global/plugins/tinymce/tinymce.min.js')?>"></script>
    
    <script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
           "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
           "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
           "save table contextmenu directionality emoticons template paste textcolor"
      ],
      relative_urls: false,
      remove_script_host: false,
      content_css: "<?=base_url('assets/global/plugins/tinymce/skins/lightgray/terms.min.css')?>",
      toolbar: "insertfile undo redo | styleselect | bold italic underline | blockquote hr | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor fontsizeselect | pastetext removeformat charmap | table | code"
});
</script>