<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/typeahead/typeahead.css')?>">
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Add User List
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-body form">
        <form role="form" method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
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
            <input name="form" type="hidden" value="1">
            <div class="row">
              <div class="col-md-8">
                <?php
                if(isset($status['form']['username']) AND $status['form']['username'] != ""){
                  $valueusername = $status['form']['username'];
                }else{
                  $valueusername = '';
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="username">Username</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" value="<?=$valueusername?>">
                    <div class="form-control-focus">
                    </div>
                    <span class="help-block">username only alphabetic and numeric</span>
                  </div>
                </div>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="password">Password</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="password" id="password">
                    <div class="form-control-focus">
                    </div>
                  </div>
                </div>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="repassword">Re-Password</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="repassword" id="repassword">
                    <div class="form-control-focus">
                    </div>
                  </div>
                </div>
                <?php
                if(isset($status['form']['fullname']) AND $status['form']['fullname'] != ""){
                  $valuefullname = $status['form']['fullname'];
                }else{
                  $valuefullname = '';
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="fullname">Fullname</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your fullname" value="<?=$valuefullname?>">
                    <div class="form-control-focus">
                    </div>
                  </div>
                </div>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="divisi">Divisi</label>
                  <div class="col-md-9">
                    <?php
                    if(isset($status['form']['iddivisi']) AND $status['form']['iddivisi'] != ""){
                      $selectdivisi = $status['form']['iddivisi'];
                    }else{
                      $selectdivisi = '';
                    }
                    ?>
                    <select name="iddivisi" class="form-control select2me" data-placeholder="Select..." id="selectmenu">
                      <option value=''>Choose Divisi</option>
                      <?php
                      foreach ($rec as $row) {
                        if ($row['id'] == $selectdivisi) {
                          $select = "selected";
                        } else {
                          $select = "";
                        }
                      ?>
                      <option <?=$select?> value="<?=$row['id']?>"><?=$row['title']?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4" style="text-align: center">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                    <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
                  </div>
                  <div>
                    <span class="btn blue btn-file">
                      <span class="fileinput-new">
                      Select image </span>
                      <span class="fileinput-exists">
                      Change </span>
                      <input type="file" name="pic">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                    Remove </a>
                  </div>
                </div>
              </div>
              <div class="col-md-offset-2 col-md-10">
                <div class="form-actions noborder margin-top-20">
                  <button class="btn blue">Submit</button>
                  <a href="<?=base_url('webadmin/user')?>" class="btn default">Cancel</a>
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
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>