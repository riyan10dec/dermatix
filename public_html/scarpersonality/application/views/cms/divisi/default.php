<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Divisi List
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <?php if ($permit->isadd == 1): ?>
    <a class="btn btn-lg blue" href="<?=base_url('webadmin/divisi/act/add')?>">
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
          <a href="<?=base_url('/webadmin/divisi/')?>">
          Publish (<?=$count_publish?>) </a>
        </li>
        <li <?=($statuspage == 'trash') ? 'class="active"' : '' ;?>>
          <a href="<?=base_url('/webadmin/divisi/trash')?>">
          Trash (<?=$count_trash?>) </a>
        </li>
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
             Title
          </th>
          <th>
             Action
          </th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach ($rec as $row) {
            if ($statuspage == 'trash') {
              $pesan = "Delete Permanently ";
              $fungsi = "delete";
            } else {
              $pesan = "Move to Trash ";
              $fungsi = "trash";
            }
          ?>
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
                  <a href="<?=base_url('webadmin/divisi/act/'.$fungsi.'/'.$row['id'])?>" class="btn btn-danger">Yes</a>
                  <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <tr>
            <td><?=$row['title']?></td>
            <td align="right">
              <?php
              if ($statuspage == 'trash') {
              ?>
              <a class="link-table" href="<?=base_url('webadmin/divisi/act/restore/'.$row['id'])?>">Restore</a>

              <a class="link-table" data-toggle="modal" style="color:red" href="#draggable<?=$row['id']?>">Delete Permanently</a>
              <?php
              } else {
              ?>
              <a href="<?=base_url('webadmin/divisi/act/edit/'.$row['id'])?>" class="link-table green btn btn-xs default">
                <i class="fa fa-edit"></i> Edit
              </a>              
              <a href="#draggable<?=$row['id']?>" data-toggle="modal" class="link-table red btn btn-xs default">
                <i class="fa fa-trash"></i> Move to Trash
              </a>
              <?php }?>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')?>"></script>
<script src="<?=base_url('assets/admin/pages/scripts/table-advanced.js')?>"></script>
<script>
  jQuery(document).ready(function() {    
    TableAdvanced.init();
  });
</script>