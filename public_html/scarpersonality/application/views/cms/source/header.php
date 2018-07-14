<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a href="<?=base_url('webadmin')?>">
      <img src="<?=base_url('assets/images/logo-tiny.png')?>" alt="logo" class="logo-default"/>
      </a>
      <div class="menu-toggler sidebar-toggler">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img alt="" class="img-circle" src="<?=base_url('assets/backend/images/user/'.$this->session->userdata('pic'))?>"/>
          <span class="username username-hide-on-mobile">
            <?=$this->session->userdata('nama');?> 
          </span>
          <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="<?=base_url('webadmin/profile')?>">
              <i class="icon-user"></i> Edit Profile </a>
            </li>
            <li class="divider">
            </li>
            <li>
              <a target="_blank" href="<?=base_url()?>">
              <i class="icon-screen-desktop"></i> Visit Site </a>
            </li>
            <li>
              <a href="<?=base_url('webadmin/logout')?>">
              <i class="icon-key"></i> Log Out </a>
            </li>
          </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>