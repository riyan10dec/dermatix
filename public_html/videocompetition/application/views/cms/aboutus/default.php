<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/jquery-nestable/jquery.nestable_single.css')?>"/>
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
About Us <small><br>Drag & drop list with mouse and touch compatibility</small>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <?php if ($permit->isadd == 1): ?>
    <a class="btn btn-lg blue" href="<?=base_url('webadmin/aboutus/act/add')?>">
      Add <i class="fa fa-plus"></i>
    </a>
    <?php endif ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="wrap-status-data">
      <ul>
        <li <?=($statuspage == 'publish') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/aboutus/')?>">
          Publish (<?=$count_publish?>) </a>
        </li>
        <li <?=($statuspage == 'draft') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/aboutus/draft')?>">
          Draft (<?=$count_draft?>) </a>
        </li>
        <!-- <li <?=($statuspage == 'scheduling') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/aboutus/scheduling')?>">
          Scheduling (<?=$count_scheduling?>) </a>
        </li>
        <li <?=($statuspage == 'expired') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/aboutus/expired')?>">
          Expired (<?=$count_expired?>) </a>
        </li> -->
        <?php if ($permit->isdelete == 1): ?>
        <li <?=($statuspage == 'trash') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/aboutus/trash')?>">
          Trash (<?=$count_trash?>) </a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
  <div class="col-md-12">
    <div class="portlet box">
      <div class="portlet-body wrap-menu-nestable">
        <?php
        if ($jumlahdata != 0) {
        ?>
        <div class="dd" <?=($statuspage == 'publish' and $permit->isupdate == 1) ? 'id="nestable_list_1"' : '' ;?> lang="aboutus">
          <ol class="dd-list">
          <?php

            $urut = 0;
            foreach ($rec as $row) {
              if ($statuspage == 'trash') {
                $pesandelete  = "Delete Permanently ";
                $pesanupdate  = "Move to Publish ";
                $fungsidelete = "delete";
                $fungsiupdate = "movepublish";
                $cssclass     = "wrap-title-nestable-trash";
              }elseif ($statuspage == 'draft') {
                $pesandelete  = "Move to Trash ";
                $pesanupdate  = "Move to Publish ";
                $fungsidelete = "movetrash";
                $fungsiupdate = "movepublish";
                $cssclass     = "wrap-title-nestable";
              } else {
                $pesandelete  = "Move to Trash ";
                $pesanupdate  = "Move to Draft ";
                $fungsidelete = "movetrash";
                $fungsiupdate = "movedraft";
                $cssclass     = "wrap-title-nestable";
              }
              
          ?>
          <?php if ($permit->isdelete == 1): ?>
          <div class="modal fade draggable-modal" id="draggable<?=$row['id']?>" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Information !!!</h4>
                </div>
                <div class="modal-body">
                   Are you sure want <?=$pesandelete.$page?> item "<b style="font-style: italic;"><?=$row['title']?> ?</b>"
                </div>
                <div class="modal-footer">
                  <a href="<?=base_url('webadmin/aboutus/act/'.$fungsidelete.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
                  <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <?php endif ?>
          <?php if ($permit->isupdate == 1): ?>
          <div class="modal fade draggable-modal" id="draft<?=$row['id']?>" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Information !!!</h4>
                </div>
                <div class="modal-body">
                   Are you sure want <?=$pesanupdate.$page?> item "<b style="font-style: italic;"><?=$row['title']?> ?</b>"
                </div>
                <div class="modal-footer">
                  <a href="<?=base_url('webadmin/aboutus/act/'.$fungsiupdate.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
                  <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <?php endif ?>
            <li class="dd-item dd3-item" data-id="<?=$row['id']?>">
              <div class="dd-handle dd3-handle ">
              </div>
              <div class="dd3-content">
                <div class="<?=$cssclass?>">
                  <?php

                  //echo $row['title'];
                  if(strlen($row['title'])<= 55){
                    echo $row['title'];
                  }else{
                    echo substr($row['title'], 0, 55)."...";
                  }


                  if ($statuspage == 'scheduling') {
                    echo " <b>[ Publish at ".$row['datestart']."]</b>";
                  } elseif($statuspage == 'expired') {
                    echo " <b>[ Expired at ".$row['dateend']."]</b>";
                  }
                  
                  ?>
                  <div class="wrap-img-nestable">
                    <a title="<?=$row['title']?>" href="<?=base_url('assets/images/aboutus/'.$row['pic'])?>" class="fancybox-button" data-rel="fancybox-button">
                      <img src="<?=base_url('assets/images/aboutus/'.$row['thumb'])?>" alt="">  
                    </a>
                  </div>
                </div>
                <div class="link-menu">
                  <?php
                  if ($statuspage == 'trash') {
                  ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <a data-toggle="modal" href="#draft<?=$row['id']?>">Restore to Publish</a>
                  <a href="<?=base_url('webadmin/aboutus/act/movedraft/'.$row['id'])?>">Restore to Draft</a>
                  <a data-toggle="modal" style="color:red" href="#draggable<?=$row['id']?>">Delete Permanently</a>
                  <?php else: ?>
                  <a href="<?=base_url('webadmin/aboutus/act/view/'.$row['id'])?>">View</a>
                  <?php endif ?>
                  <?php
                  } elseif ($statuspage == 'draft'){
                  ?>
                  <?php if ($permit->isupdate == 1): ?>
                  <a href="<?=base_url('webadmin/aboutus/act/edit/'.$row['id'])?>">Edit</a>
                  <a data-toggle="modal" href="#draft<?=$row['id']?>">Move to Publish</a>
                  <?php else: ?>
                  <a href="<?=base_url('webadmin/aboutus/act/view/'.$row['id'])?>">View</a>
                  <?php endif ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <a data-toggle="modal" href="#draggable<?=$row['id']?>">Move to Trash</a>
                  <?php endif ?>
                  <?php
                  } else {
                  ?>
                  <?php if ($permit->isupdate == 1): ?>
                  <?php if ($statuspage == 'scheduling' OR $statuspage == 'expired'): ?>
                  <a href="<?=base_url('webadmin/aboutus/act/edit/'.$row['id'])?>">Edit & Change Schedule</a>
                  <?php else: ?>
                  <a data-toggle="modal" href="#draft<?=$row['id']?>">Move to Draft</a>
                  <a href="<?=base_url('webadmin/aboutus/act/edit/'.$row['id'])?>">Edit</a>
                  <?php endif ?>
                  <?php else: ?>
                  <a href="<?=base_url('webadmin/aboutus/act/view/'.$row['id'])?>">View</a>
                  <?php endif ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <a data-toggle="modal" href="#draggable<?=$row['id']?>">Move to Trash</a>
                  <?php endif ?>
                  <?php }?>
                </div>
              </div>
            </li>
          <?php
            $urut++;
            }
          ?>
          </ol>
        </div>
        <?php
        } else {
        echo "No Data Found";
        }
        
        ?>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url('assets/backend/global/plugins/jquery-nestable/jquery.nestable_single.js')?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?=base_url('assets/backend/admin/pages/scripts/ui-nestable.js')?>"></script>
<script>
  var uri = '<?=base_url('webadmin/reorder_list')?>'
</script>
<script>
jQuery(document).ready(function() {
   UINestable.init();
});
</script>
<!-- END PAGE CONTENT-->