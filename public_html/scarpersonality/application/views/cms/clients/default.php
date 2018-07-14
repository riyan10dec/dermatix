<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
List Clients
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <?php if ($permit->isadd == 1): ?>
    <a class="btn btn-lg blue" href="<?=base_url('webadmin/clients/act/add')?>">
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
          <a href="<?=base_url('/webadmin/clients/')?>">
          Publish (<?=$count_publish?>) </a>
        </li>
        <li <?=($statuspage == 'draft') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/clients/draft')?>">
          Draft (<?=$count_draft?>) </a>
        </li>
        <?php if ($permit->isdelete == 1): ?>
        <li <?=($statuspage == 'trash') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/clients/trash')?>">
          Trash (<?=$count_trash?>) </a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
  <div class="col-md-12">
    <div class="portlet box">
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_6">
        <thead>
        <tr>
          <th>
             No
          </th>
          <th>
             Title
          </th>
          <th>
             Poster
          </th>
          <th>
             Action
          </th>
        </tr>
        </thead>
        <tbody id="ver-middle">
          <?php
          $i = 1;
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
                  <a href="<?=base_url('webadmin/clients/act/'.$fungsidelete.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
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
                  <a href="<?=base_url('webadmin/clients/act/'.$fungsiupdate.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
                  <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <?php endif ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$row['title']?></td>
            <td>
              <a data-rel="fancybox-button" class="fancybox-button" href="<?=base_url('assets/images/clients/'.$row['pic'])?>" title="<?=$row['title']?>">
                <img alt="" src="<?=base_url('assets/images/clients/'.$row['thumb'])?>">  
              </a>
            </td>
            <td align="right">
              <?php
              if ($statuspage == 'trash') {
              ?>
              <div class="link-menu">
              <?php if ($permit->isdelete == 1): ?>
              <a data-toggle="modal" href="#draft<?=$row['id']?>">Restore to Publish</a>
              <a href="<?=base_url('webadmin/clients/act/restore/'.$row['id'])?>">Restore to Draft</a>
              <a data-toggle="modal" style="color:red" href="#draggable<?=$row['id']?>">Delete Permanently</a>
              <?php else: ?>
              <a href="<?=base_url('webadmin/clients/act/view/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-eye"></i> View
              </a>
              <?php endif ?>
              </div>
              <?php
              } elseif ($statuspage == 'draft'){
              ?>
              <?php if ($permit->isupdate == 1): ?>
              <a href="<?=base_url('webadmin/clients/act/edit/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-edit"></i> Edit
              </a>
              <a href="#draft<?=$row['id']?>" data-toggle="modal" class="link-table blue btn btn-xs default">
                <i class="fa fa-file-text"></i> Move to Publish
              </a>
              <?php else: ?>
              <a href="<?=base_url('webadmin/clients/act/view/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-eye"></i> View
              </a>
              <?php endif ?>
              <?php if ($permit->isdelete == 1): ?>
              <a href="#draggable<?=$row['id']?>" data-toggle="modal" class="link-table red btn btn-xs default">
                <i class="fa fa-trash"></i> Move to Trash
              </a>
              <?php endif ?>
              <?php
              } else {
              ?>
              <?php if ($permit->isupdate == 1): ?>
              <a href="<?=base_url('webadmin/clients/act/edit/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-edit"></i> Edit
              </a>
              <a href="#draft<?=$row['id']?>" data-toggle="modal" class="link-table blue btn btn-xs default">
                <i class="fa fa-file-text-o"></i> Move to Draft
              </a>
              <?php else: ?>
              <a href="<?=base_url('webadmin/clients/act/view/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-eye"></i> View
              </a>
              <?php endif ?>
              <?php if ($permit->isdelete == 1): ?>
              <a href="#draggable<?=$row['id']?>" data-toggle="modal" class="link-table red btn btn-xs default">
                <i class="fa fa-trash"></i> Move to Trash
              </a>
              <?php endif ?>
              <?php }?>
            </td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')?>"></script>
<script src="<?=base_url('assets/backend/admin/pages/scripts/table-advanced.js')?>"></script>
<script>
  jQuery(document).ready(function() {    
    TableAdvanced.init();
  });
</script>