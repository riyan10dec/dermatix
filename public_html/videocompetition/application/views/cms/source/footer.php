<div class="page-footer">
  <div class="page-footer-inner">
     © Copyright 2015. All Rights Reserved.
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?=base_url('assets/backend/global/plugins/jquery-migrate.min.js')?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=base_url('assets/backend/global/plugins/jquery-ui/jquery-ui.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/uniform/jquery.uniform.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('assets/backend/admin/pages/scripts/components-pickers.js')?>"></script>
<script src="<?=base_url('assets/backend/global/scripts/metronic.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/backend/admin/layout/scripts/layout.js')?>" type="text/javascript"></script>

<script src="<?=base_url('assets/backend/admin/layout/scripts/demo.js')?>" type="text/javascript"></script>

<script src="<?=base_url('assets/backend/admin/pages/scripts/components-dropdowns.js')?>"></script>
<script>
  jQuery(document).ready(function() {    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features      
    ComponentsPickers.init();
  });
  $('.input-title-key').keyup(function(){
    var title = $('.input-title-key').val();
    var title = title.replace(/\s+/g, '');
    var title = title.toLowerCase();
    $('.input-link-key').val(title);
  });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>