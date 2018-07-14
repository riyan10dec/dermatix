<?php
// echo "<pre>";
// print_r($this->session->all_userdata());
// die();
?>
<div class="page-sidebar-wrapper">
 
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <?php
        
        if ($active == 'dashboard') {
          $classaktif = 'active';
          $spanaktif = '<span class="selected"></span>';
        } else {
          $classaktif = '';
          $spanaktif = '';
        }
        
        ?>
        <li class="start <?=$classaktif?>">
          <a href="<?=base_url('webadmin')?>">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          <?=$spanaktif?>
          </a>
        </li>
        <?php
        $r = 0;
        foreach ($menulist[0] as $rowmenu) {

          if($submenu == TRUE){
            if ($page == $rowmenu['title']){
              $classaktif = 'active open';
              $spanaktif = '<span class="selected"></span>';
              $classarrow = 'open';
            } else {
              $classaktif = '';
              $spanaktif = '';
              $classarrow = '';
            }
          }else{
            if ($active == $rowmenu['link']) {
              $classaktif = 'active';
              $spanaktif = '<span class="selected"></span>';
              $classarrow = '';
            } else {
              $classaktif = '';
              $spanaktif = '';
              $classarrow = '';
            }
          }
        if ($rowmenu['submenu'] == 0) {
        ?>
        <li class="<?=$classaktif?>">
          <a href="<?=base_url('index.php/webadmin/'.$rowmenu['link'])?>">
          <i class="<?=$rowmenu['icon']?>"></i>
          <span class="title"><?=$rowmenu['title']?></span>
          <?=$spanaktif?>
          </a>
        </li>
        <?php
        } else {
        ?>
        <li class="<?=$classaktif?>">
          <a href="javascript:;">
          <i class="<?=$rowmenu['icon']?>"></i>
          <span class="title"><?=$rowmenu['title']?></span>
          <span class="arrow <?=$classarrow?>"></span>
          </a>
          <ul class="sub-menu">
        <?php
          if (isset($menulist[1][$r][0])) {
            foreach ($menulist[1][$r] as $rowsubmenu) {
            if ($active == $rowsubmenu['link']) {
              $classsubaktif = 'active';
            } else {
              $classsubaktif = '';
            }
        ?>
            <li class="<?=$classsubaktif?>">
              <a href="<?=base_url('index.php/webadmin/'.$rowsubmenu['link'])?>">
              <i class="<?=$rowsubmenu['icon']?>"></i>
              <?=$rowsubmenu['title']?></a>
            </li>
        <?php
            }
          }
        ?>
          </ul>
        </li>
        <?php
        }
        $r++;
        }
        ?>
        <!-- <li>
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">eCommerce</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="ecommerce_index.html">
              <i class="icon-home"></i>
              Dashboard</a>
            </li>
            <li>
              <a href="ecommerce_orders.html">
              <i class="icon-basket"></i>
              Orders</a>
            </li>
            <li>
              <a href="ecommerce_orders_view.html">
              <i class="icon-tag"></i>
              Order View</a>
            </li>
            <li>
              <a href="ecommerce_products.html">
              <i class="icon-handbag"></i>
              Products</a>
            </li>
            <li>
              <a href="ecommerce_products_edit.html">
              <i class="icon-pencil"></i>
              Product Edit</a>
            </li>
          </ul>
        </li> -->
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>