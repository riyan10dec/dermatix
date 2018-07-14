<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
List Video <strong>Behind the Scar</strong>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
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
            Name
          </th>
          <th class="col-long-txt">
            Email
          </th>
          <th>
            Judul
          </th>
          <th>
            Action
          </th>
        </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($rec as $row) {
          ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$row['name']?></td>
            <td class="col-long-txt"><?=$row['email']?></td>
            <td>
              <a href="http://www.youtube.com/watch?v=opj24KnzrWo" class="fancybox-media fancybox.iframe" data-rel="fancybox-media">
                <?=$row['judul']?>
              </a>
            </td>
            <td align="right">
              <?php if ($permit->isupdate == 1): ?>
                <?php if ($row['status'] == 1): ?>
                <a href="" class="btn blue btn-muncul ig<?=$row['id']?>" data-status="<?=$row['status']?>" data-post="<?=$row['id']?>">
                  Visible <i class="fa fa-eye"></i>
                </a>
                <?php else: ?>
                <a href="" class="btn default btn-muncul ig<?=$row['id']?>" data-status="<?=$row['status']?>" data-post="<?=$row['id']?>">
                  Invisible <i class="fa fa-eye-slash"></i>
                </a>
                <?php endif ?>
              <?php else: ?>
                <?php if ($row['status'] == 1): ?>
                <div class="btn blue">
                  Visible <i class="fa fa-eye"></i>
                </div>
                <?php else: ?>
                <div class="btn default">
                  Invisible <i class="fa fa-eye-slash"></i>
                </div>
                <?php endif ?>
              <?php endif ?>
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
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')?>"></script>
<script src="<?=base_url('assets/admin/pages/scripts/table-advanced.js')?>"></script>
<script type="text/javascript">
$(function(){

  $('.btn-muncul').click(function(){
    var post = $(this).attr('data-post');
    var status = $(this).attr('data-status');
    //alert(post);
    var uri = "<?=base_url('webadmin/visible')?>";
    var formData = {'status': status, 'from': "instagram", 'post': post};
    //console.log(formData);
    $.ajax({
      url:uri,
      type: 'POST',
      data: formData,
      async: false,              
      success: function (data) {
        //console.log(data);
        if(data==1){
          $('.ig'+post).removeClass( "default" ).addClass( "blue" );
          $('.ig'+post).attr('data-status',1);
          $('.ig'+post).html('Visible <i class="fa fa-eye"></i>')
        }else if(data==0){
          $('.ig'+post).removeClass( "blue" ).addClass( "default" );
          $('.ig'+post).attr('data-status',0);
          $('.ig'+post).html('Invisible <i class="fa fa-eye-slash"></i>')
        }
      }
    });
    return false;
  });
});
</script>
<script>
  jQuery(document).ready(function() {    
    TableAdvanced.init();
  });
</script>
