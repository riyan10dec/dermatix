<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/global/plugins/jquery-nestable/jquery.nestable.css')?>"/>
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Menu List <small>Drag & drop list with mouse and touch compatibility</small>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <?php if ($permit->isadd == 1): ?>
    <a class="btn btn-lg blue" href="<?=base_url('index.php/webadmin/menu/act/add')?>">
      Add <i class="fa fa-plus"></i>
    </a>
    <?php endif ?>
    <div id="nestable_list_menu" class="margin-top-5">
      <button type="button" class="btn grey-cascade" data-action="expand-all">Expand All</button>
      <button type="button" class="btn grey-cascade" data-action="collapse-all">Collapse All</button>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="wrap-status-data">
      <ul>
        <li <?=($statuspage == 'publish') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/index.php/webadmin/menu/')?>">
          Publish (<?=$count_publish?>) </a>
        </li>
        <?php if ($permit->isdelete == 1): ?>
        <li <?=($statuspage == 'trash') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/index.php/webadmin/menu/trash')?>">
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
        <div class="dd" <?=($statuspage == 'publish' and $permit->isupdate == 1) ? 'id="nestable_list_1"' : '' ;?> lang="menu">
          <ol class="dd-list">
          <?php
            $urut = 0;
            foreach ($rec as $row) {
              if ($statuspage == 'trash') {
                $pesan = "Delete Permanently ";
                $fungsi = "delete";
              } else {
                $pesan = "Move to Trash ";
                $fungsi = "trash";
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
                   Are you sure want <?=$pesan.$page?> item "<b style="font-style: italic;"><?=$row['title']?> ?</b>"
                </div>
                <div class="modal-footer">
                  <a href="<?=base_url('index.php/webadmin/menu/act/'.$fungsi.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
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
                <b><?=$row['title']?></b>
                <div class="link-menu">
                  <?php
                  if ($statuspage == 'trash') {
                  ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <a href="<?=base_url('index.php/webadmin/menu/act/restore/'.$row['id'])?>">Restore</a>
                  <a data-toggle="modal" style="color:red" href="#draggable<?=$row['id']?>">Delete Permanently</a>
                  <?php endif ?>
                  <?php
                  } else {
                  ?>
                  <?php if ($permit->isupdate == 1): ?>
                  <a href="<?=base_url('index.php/webadmin/menu/act/edit/'.$row['id'])?>">Edit</a>
                  <?php endif ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <a data-toggle="modal" href="#draggable<?=$row['id']?>">Move to Trash</a>
                  <?php endif ?>
                  <?php }?>
                </div>
              </div>
              <?php
              if(isset($child[$urut][0])){
              echo '<ol class="dd-list">';

                foreach ($child[$urut] as $row2) {
                ?>
                  <?php if ($permit->isdelete == 1): ?>
                  <div class="modal fade draggable-modal" id="draggable<?=$row2['id']?>" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                          <h4 class="modal-title">Information !!!</h4>
                        </div>
                        <div class="modal-body">
                           Are you sure want move to trash <?=$page?> item "<b style="font-style: italic;"><?=$row2['title']?> ?</b>"
                        </div>
                        <div class="modal-footer">
                          <a href="<?=base_url('index.php/webadmin/menu/act/trash/'.$row2['id'])?>" class="btn btn-danger">Yes</a>
                          <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <?php endif ?>
                  <li class="dd-item dd3-item" data-id="<?=$row2['id']?>">
                    <div class="dd-handle dd3-handle">
                    </div>
                    <div class="dd3-content">
                      <?=$row2['title']?>
                      <div class="link-menu">
                        <?php if ($permit->isupdate == 1): ?>
                        <a href="<?=base_url('index.php/webadmin/menu/act/edit/'.$row2['id'])?>">Edit</a>
                        <?php endif ?>
                        <?php if ($permit->isdelete == 1): ?>
                        <a data-toggle="modal" href="#draggable<?=$row2['id']?>">Move to Trash</a>
                        <?php endif ?>
                      </div>
                    </div>
                  </li>
                <?php
                }
                
              echo '</ol>';
                
              }
              ?>
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
<script src="<?=base_url('assets/backend/global/plugins/jquery-nestable/jquery.nestable.js')?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?=base_url('assets/backend/admin/pages/scripts/ui-nestable.js')?>"></script>
<script>
  var uri = '<?=base_url('index.php/webadmin/reorder_menu')?>'
</script>
<script>
jQuery(document).ready(function() {
   UINestable.init();
});
</script>
<!-- END PAGE CONTENT-->