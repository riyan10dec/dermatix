<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Add Divisi List
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-body form">
        <form role="form" method="POST" action="">
          <div class="form-body">
            <?php
            if (isset($status)) {
             if ($status['success'] == true) {
            ?>
              <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                Data has been saved!
              </div>
            <?php
              } else {
            ?>
              <div class="alert alert-danger ">
                <button class="close" data-close="alert"></button>
                Data not saved. Please check field.
                <ul>
                  <?=$status['notice']?>
                </ul>
              </div>
              <?php
              }
            }
            ?>
            <div class="row">
              <div class="col-md-10">
                <div class="row margin-bottom-20">
                  <input name="form" type="hidden" value="1">
                  <div class="col-md-12">
                    <?php
                    if(isset($status['form']['title']) AND $status['form']['title'] != ""){
                      $valuetitle = $status['form']['title'];
                      $classtitle = "edited";
                    }else{
                      $valuetitle = '';
                      $classtitle = '';
                    }
                    ?>
                    <div class="form-group form-md-line-input form-md-floating-label has-info margin-bottom-10">
                      <input name="title" type="text" id="title" value="<?=$valuetitle?>" class="form-control input-lg input-title-key <?=$classtitle?>">
                      <label for="title">Title Divisi</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="wrap-btn-check">
                      <button type="button" class="check-all btn blue-hoki">Check All</button>
                      <button type="button" class="uncheck-all btn btn-success">Uncheck All</button>
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive">
                        <table class="table">
                        <thead>
                        <tr>
                          <th style="width:50px;text-align:center">
                             #
                          </th>
                          <th style="text-align:center">
                             Menu Title
                          </th>
                          <th style="width:360px;text-align:center">
                             Action
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                          $urut = 0;
                          foreach ($rec as $row) {
                          ?>
                          <tr>
                            <td style="width:50px;text-align:center"><strong><?=$row['posisi']?></strong></td>
                            <td><strong><?=$row['title']?></strong></td>
                            <td>
                              <?php

                              if(isset($status['form']['view']) AND $status['form']['view'] != ''){
                                $accview = $status['form']['view'];
                              }else{
                                $accview = '';
                              }
                              if(isset($status['form']['add']) AND $status['form']['add'] != ''){
                                $accadd = $status['form']['add'];
                              }else{
                                $accadd = '';
                              }
                              if(isset($status['form']['update']) AND $status['form']['update'] != ''){
                                $accupdate = $status['form']['update'];
                              }else{
                                $accupdate = '';
                              }
                              if(isset($status['form']['delete']) AND $status['form']['delete'] != ''){
                                $accdelete = $status['form']['delete'];
                              }else{
                                $accdelete = '';
                              }
                              ?>
                              <div class="md-checkbox-inline checkbox-table">
                                <div class="md-checkbox has-success">
                                  <input type="checkbox"
                                  <?php
                                    // $ischeck = strpos($accview, $row['id']); 
                                    // if ($ischeck !== false) {
                                    //   $check = "checked";
                                    // }else{
                                    //   $check = "";
                                    // }
                                    $ischeck = explode(';',$accview);
                                    if (in_array($row['id'], $ischeck)) {
                                      $check = "checked";
                                    }else{
                                      $check = "";
                                    }
                                    
                                  ?>
                                  value="1" name="accview[<?=$row['id']?>]" id="view<?=$row['id']?>" class="md-check view-check" lang="<?=$row['id']?>" <?=$check?>>
                                  <label for="view<?=$row['id']?>">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>
                                  View </label>
                                </div>
                                <?php
                                //$akses = $row['akses'];
                                $akses = strpos($row['akses'], '1');

                                if ($akses !== false) {
                                ?>
                                <div class="md-checkbox has-info">
                                  <input type="checkbox"
                                  <?php
                                    $ischeckadd = explode(';',$accadd);
                                    if (in_array($row['id'], $ischeckadd)) {
                                      $check = "checked";
                                    }else{
                                      $check = "";
                                    }
                                  ?>
                                  value="1" name="accadd[<?=$row['id']?>]" id="add<?=$row['id']?>" class="md-check add-check" lang="<?=$row['id']?>" <?=$check?>>
                                  <label for="add<?=$row['id']?>">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>
                                  Add </label>
                                </div>
                                <?php 
                                }
                                $akses = strpos($row['akses'], '2');
                                if ($akses !== false) {
                                ?>
                                <div class="md-checkbox has-info">
                                  <input type="checkbox"
                                  <?php
                                    $ischeckupdate = explode(';',$accupdate);
                                    if (in_array($row['id'], $ischeckupdate)) {
                                      $check = "checked";
                                    }else{
                                      $check = "";
                                    }
                                  ?>
                                  value="1" name="accupdate[<?=$row['id']?>]" id="update<?=$row['id']?>" class="md-check update-check" lang="<?=$row['id']?>" <?=$check?>>
                                  <label for="update<?=$row['id']?>">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>
                                  Update </label>
                                </div>
                                <?php 
                                }
                                $akses = strpos($row['akses'], '3');
                                if ($akses !== false) {
                                ?>
                                <div class="md-checkbox has-error">
                                  <input type="checkbox"
                                  <?php
                                    $ischeckdelete = explode(';',$accdelete);
                                    if (in_array($row['id'], $ischeckdelete)) {
                                      $check = "checked";
                                    }else{
                                      $check = "";
                                    }
                                  ?>
                                  value="1" name="accdelete[<?=$row['id']?>]" id="delete<?=$row['id']?>" class="md-check delete-check" lang="<?=$row['id']?>" <?=$check?>>
                                  <label for="delete<?=$row['id']?>">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>
                                  Delete </label>
                                </div>
                                <?php 
                                }
                                ?>
                              </div>
                            </td>
                          </tr>
                          <?php
                            if(isset($child[$urut][0])){
                              foreach ($child[$urut] as $row2) {
                              ?>
                              <tr>
                                <td style="width:50px;text-align:center"><?=$row['posisi']?>.<?=$row2['posisi']?></td>
                                <td class="list-child"><?=$row2['title']?></td>
                                <td>
                                  <div class="md-checkbox-inline checkbox-table">
                                    <div class="md-checkbox has-success">
                                      <input type="checkbox"
                                      <?php
                                        $ischeck = explode(';',$accview);
                                        if (in_array($row2['id'], $ischeck)) {
                                          $check = "checked";
                                        }else{
                                          $check = "";
                                        }
                                      ?>
                                      value="1" name="accview[<?=$row2['id']?>]" id="view<?=$row2['id']?>" class="md-check view-check" lang="<?=$row2['id']?>" <?=$check?>>
                                      <label for="view<?=$row2['id']?>">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>
                                      View </label>
                                    </div>
                                    <?php
                                    //$akses = $row['akses'];
                                    $akses = strpos($row2['akses'], '1');

                                    if ($akses !== false) {
                                    ?>
                                    <div class="md-checkbox has-info">
                                      <input type="checkbox"
                                      <?php
                                        $ischeckadd = explode(';',$accadd);
                                        if (in_array($row2['id'], $ischeckadd)) {
                                          $check = "checked";
                                        }else{
                                          $check = "";
                                        }
                                      ?>
                                      value="1" name="accadd[<?=$row2['id']?>]" id="add<?=$row2['id']?>" class="md-check add-check" lang="<?=$row2['id']?>" <?=$check?>>
                                      <label for="add<?=$row2['id']?>">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>
                                      Add </label>
                                    </div>
                                    <?php 
                                    }
                                    $akses = strpos($row2['akses'], '2');
                                    if ($akses !== false) {
                                    ?>
                                    <div class="md-checkbox has-info">
                                      <input type="checkbox"
                                      <?php
                                        $ischeckupdate = explode(';',$accupdate);
                                        if (in_array($row2['id'], $ischeckupdate)) {
                                          $check = "checked";
                                        }else{
                                          $check = "";
                                        }
                                      ?>
                                      value="1" name="accupdate[<?=$row2['id']?>]" id="update<?=$row2['id']?>" class="md-check update-check" lang="<?=$row2['id']?>" <?=$check?>>
                                      <label for="update<?=$row2['id']?>">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>
                                      Update </label>
                                    </div>
                                    <?php 
                                    }
                                    $akses = strpos($row2['akses'], '3');
                                    if ($akses !== false) {
                                    ?>
                                    <div class="md-checkbox has-error">
                                      <input type="checkbox"
                                      <?php
                                        $ischeckdelete = explode(';',$accdelete);
                                        if (in_array($row2['id'], $ischeckdelete)) {
                                          $check = "checked";
                                        }else{
                                          $check = "";
                                        }
                                      ?>
                                      value="1" name="accdelete[<?=$row2['id']?>]" id="delete<?=$row2['id']?>" class="md-check delete-check" lang="<?=$row2['id']?>" <?=$check?>>
                                      <label for="delete<?=$row2['id']?>">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>
                                      Delete </label>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                  </div>
                                </td>
                              </tr>
                              <?php
                              }
                            } 
                          $urut++;
                          }
                          ?>
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions noborder margin-top-20">
                  <button class="btn blue">Submit</button>
                  <a href="<?=base_url('webadmin/menu')?>" class="btn default">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>
<script> 
  $('.check-all').click(function(){
    $('.view-check').attr('checked', '');
    $('.add-check').attr('checked', '');
    $('.update-check').attr('checked', '');
    $('.delete-check').attr('checked', '');
  });
  $('.uncheck-all').click(function(){
    $('.view-check').removeAttr('checked');
    $('.add-check').removeAttr('checked');
    $('.update-check').removeAttr('checked');
    $('.delete-check').removeAttr('checked');
  });
  $('.view-check').change(function(){
    var lang = $(this).attr('lang');
    if (!this.checked) {
      $('#add'+lang).removeAttr('checked');
      $('#update'+lang).removeAttr('checked');
      $('#delete'+lang).removeAttr('checked');
    }
  });
  $('.add-check').change(function(){
    var lang = $(this).attr('lang');
    if(this.checked){
      $('#view'+lang).attr('checked', '');
    }
  });
  $('.update-check').change(function(){
    var lang = $(this).attr('lang');
    if(this.checked){
      $('#view'+lang).attr('checked', '');
    }
  });
  $('.delete-check').change(function(){
    var lang = $(this).attr('lang');
    if(this.checked){
      $('#view'+lang).attr('checked', '');
    }
  });
</script>