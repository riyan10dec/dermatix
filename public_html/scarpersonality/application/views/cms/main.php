<?php $this->load->view('cms/source/head.php')?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<?php $this->load->view('cms/source/header.php')?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <?php $this->load->view('cms/source/sidebar.php')?>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
      <?php
      if ($active == 'dashboard') {
      ?>
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?=base_url('webadmin')?>">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Dashboard</a>
          </li>
        </ul>
        <div class="page-toolbar">
          <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
          </div>
        </div>
      <?php
      } else {
      ?>
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?=base_url('webadmin')?>">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <?php if ($submenu == TRUE): ?>
            <a href="#"><?=$page?></a>
            <?php else: ?>
            <a href="<?=base_url('webadmin/'.$active)?>"><?=$page?></a>
            <?php endif ?>
          </li>
          <?php if ($submenu == TRUE): ?>
          <li>
            <i class="fa fa-angle-right"></i>
            <a href="<?=base_url('webadmin/'.$activesub)?>"><?=$pagesub?></a>
          </li>
          <?php endif ?>
        </ul>
      <?php
      }
      ?>
      </div>
      <?php
        if ($act == 'add'){
            $this->load->view('cms/'.$active.'/add.php');
        }elseif ($act == 'edit'){
            $this->load->view('cms/'.$active.'/edit.php');
        }elseif ($act == 'view'){
            $this->load->view('cms/'.$active.'/view.php');
        }else{
            $this->load->view('cms/'.$active.'/default.php');
        }
      ?>
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('cms/source/footer.php')?>