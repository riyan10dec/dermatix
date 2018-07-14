<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css')?>" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<h3 class="page-title">
Dashboard <small>reports & statistics</small>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue-madison">
      <div class="visual">
        <i class="fa fa-comments"></i>
      </div>
      <div class="details">
        <div class="number">
           1349
        </div>
        <div class="desc">
           New Feedbacks
        </div>
      </div>
      <a class="more" href="javascript:;">
      View more <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat red-intense">
      <div class="visual">
        <i class="fa fa-bar-chart-o"></i>
      </div>
      <div class="details">
        <div class="number">
           12,5M$
        </div>
        <div class="desc">
           Total Profit
        </div>
      </div>
      <a class="more" href="javascript:;">
      View more <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat green-haze">
      <div class="visual">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <div class="details">
        <div class="number">
           549
        </div>
        <div class="desc">
           New Orders
        </div>
      </div>
      <a class="more" href="javascript:;">
      View more <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple-plum">
      <div class="visual">
        <i class="fa fa-globe"></i>
      </div>
      <div class="details">
        <div class="number">
           +89%
        </div>
        <div class="desc">
           Brand Popularity
        </div>
      </div>
      <a class="more" href="javascript:;">
      View more <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<script src="<?=base_url('assets/global/plugins/jquery.pulsate.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')?>" type="text/javascript"></script>

<script src="<?=base_url('assets/global/plugins/fullcalendar/fullcalendar.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/global/plugins/jquery.sparkline.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/global/plugins/fullcalendar/fullcalendar.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('assets/admin/pages/scripts/index.js')?>" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Index.init();   
   Index.initDashboardDaterange();
   Index.initCalendar(); // init index page's custom scripts
});
</script>