<link rel="stylesheet" type="text/css" href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')?>"/>

<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Edit List Kota [Competition]
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
            if($rec['draft'] == 1){
              $txtstatus = 'Draft';
              $classstatus = 'alert-warning';
            }else{
              $txtstatus = 'Publish';
              $classstatus = 'alert-success';
            }
            ?>
            <div class="alert <?=$classstatus?>">
                Status : <strong><?=$txtstatus?></strong>
              </div>
            <input name="form" type="hidden" value="1">
            <div class="row">
              <div class="col-md-7">
                <?php
                if(isset($status['form']['kota']) AND $status['form']['kota'] != ""){
                  $valuekota = $status['form']['kota'];
                  $classkota = "edited";
                }else{
                  $valuekota = $rec['kota'];
                  $classkota = "edited";
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="kota">Kota</label>
                  <div class="col-md-9">
                    <input readonly="" type="text" class="form-control <?=$classkota?>" name="kota" id="kota" placeholder="Enter your city" value="<?=$valuekota?>">
                    <div class="form-control-focus">
                    </div>
                  </div>
                </div>
                <?php
                if(isset($status['form']['startdate']) AND $status['form']['startdate'] != ""){
                  $valuestartdate = $status['form']['startdate'];
                  $classstartdate = "edited";
                }else{
                  $valuestartdate = $rec['datestart'];
                  $classstartdate = '';
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="control-label col-md-3">Start Date</label>
                  <div class="col-md-9">
                    <input readonly="" name="startdate" class="form-control form-control-inline input-medium" size="16" type="text" value="<?=$valuestartdate?>"/>
                  </div>
                </div>
                <?php
                if(isset($status['form']['enddate']) AND $status['form']['enddate'] != ""){
                  $valueenddate = $status['form']['enddate'];
                  $classenddate = "edited";
                }else{
                  $valueenddate = $rec['dateend'];
                  $classenddate = '';
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="control-label col-md-3">End Date</label>
                  <div class="col-md-9">
                    <input readonly="" name="enddate" class="form-control form-control-inline input-medium" size="16" type="text" value="<?=$valueenddate?>"/>
                  </div>
                </div>
                <?php
                if(isset($status['form']['lokasi']) AND $status['form']['lokasi'] != ""){
                  $valuelokasi = $status['form']['lokasi'];
                  $classlokasi = "edited";
                }else{
                  $valuelokasi = $rec['lokasi'];
                  if($rec['lokasi'] != ''){
                    $classlokasi = 'edited'; 
                  }else{
                    $classlokasi = ''; 
                  }
                }
                ?>
                <div class="form-group form-md-line-input">
                  <label class="col-md-3 control-label" for="lokasi">Lokasi</label>
                  <div class="col-md-9">
                    <textarea readonly="" name="lokasi" class="form-control <?=$classlokasi?>" rows="2" placeholder="Enter Lokasi"><?=$valuelokasi?></textarea>
                    <div class="form-control-focus">
                    </div>
                  </div>
                </div>
                <div class="col-md-offset-3 col-md-9">
                  <div class="form-actions noborder margin-top-20">
                    <a href="<?=base_url('webadmin/listkota')?>" class="btn default">Back to List</a>
                  </div>
                </div>
              </div>
              <div class="col-md-5 lebarwidth" style="text-align: center">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail pic-exist">
                    <?php if ($rec['pic'] != ""): ?>
                    <img src="<?=base_url('assets/images/listkota/'.$rec['pic'])?>" alt=""/>
                    <?php else: ?>
                    <img src="http://www.placehold.it/400x225/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                    <?php endif ?>
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail">
                  </div>
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

<script>
  jQuery(document).ready(function() {    
    ComponentsPickers.init();
  });
  var lebihdiv = $('.lebarwidth').width();
  $('.pic-exist').css('max-width',lebihdiv);
  $('.fileinput-preview').css('max-width',lebihdiv);
</script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>