<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Edit Menu List
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
                <div class="row margin-bottom-10">
                  <input name="form" type="hidden" value="1">
                  <div class="col-md-12">
                    <?php
                    if(isset($status['form']['title']) AND $status['form']['title'] != ""){
                      $valuetitle = $status['form']['title'];
                      $classtitle = "edited";
                    }else{
                      $valuetitle = $rec['title'];
                      $classtitle = 'edited';
                    }
                    ?>
                    <div class="form-group form-md-line-input form-md-floating-label has-info margin-bottom-10">
                      <input name="title" type="text" id="title" value="<?=$valuetitle?>" class="form-control input-lg input-title-key <?=$classtitle?>">
                      <label for="title">Title Menu</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <?php
                    if(isset($status['form']['idparent']) AND $status['form']['idparent'] != ""){
                      $selectidparent = $status['form']['idparent'];
                    }else{
                      $selectidparent = $rec['parent'];
                    }
                    //echo $selectidparent;
                    ?>
                    <div class="form-group dropdown-menulist margin-top-20">
                      <select name="idparent" class="form-control select2me" data-placeholder="Select..." id="selectmenu">
                        <option value=''>Choose Parent</option>
                        <option value='0' <?=($selectidparent == '0') ? "selected" : "" ;?>>Root Menu</option>
                        <?php
                        foreach ($menuparent as $row) {
                          if ($row['id'] == $selectidparent) {
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
                <div class="row">
                  <div class="col-md-6 ">
                    <?php
                    if(isset($status['form']['link']) AND $status['form']['link'] != ""){
                      $valuelink = $status['form']['link'];
                    }else{
                      $valuelink = $rec['link'];
                    }
                    ?>
                    <div class="form-group form-md-line-input has-info">
                      <div class="input-group">
                        <span class="input-group-addon info-link">
                        webadmin/
                        </span>
                        <input value="<?=$valuelink?>" type="text" name="link" class="form-control input-link-key">
                        <label for="form_control_1">Link URL</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <?php
                    if(isset($status['form']['submenu'])){
                      $valcheck = $status['form']['submenu'];
                    }else{
                      $valcheck = $rec['submenu'];
                    }
                    if($valcheck == 1){
                      $check = "checked";
                    }else{
                      $check = '';
                    }
                    ?>
                    <div class="form-group form-md-line-input">
                      <label for="submenu" class="col-md-6 col-sm-6 col-xs-6 control-label label-margin">Has Submenu ?</label>
                      <div class="col-md-6 col-sm-6 col-xs-6 wrap-submenu">
                        <input type="checkbox" name="submenu" id="submenu" value="1" <?=$check?> class="make-switch" data-on-text="Yes" data-off-text="No">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <?php
                    if(isset($status['form']['acc']) AND $status['form']['acc'] != ''){
                      $acc = $status['form']['acc'];
                    }else{
                      $acc = $rec['akses'];
                    }
                    ?>
                    <div class="form-group form-md-checkboxes">
                      <label>Access</label>
                      <div class="md-checkbox-inline">
                        <div class="md-checkbox">
                          <input type="checkbox"
                          <?php
                            $pos = strpos($acc, '1');

                            if ($pos !== false) {
                                 echo "checked";
                            } else {
                                 echo "";
                            }
                          ?>
                          value="1" name="acc[]" id="add" class="md-check">
                          <label for="add">
                          <span></span>
                          <span class="check"></span>
                          <span class="box"></span>
                          Add </label>
                        </div>
                        <div class="md-checkbox">
                          <input type="checkbox"
                          <?php
                            $pos = strpos($acc, '2');

                            if ($pos !== false) {
                                 echo "checked";
                            } else {
                                 echo "";
                            }
                          ?>
                          value="2" name="acc[]" id="update" class="md-check">
                          <label for="update">
                          <span></span>
                          <span class="check"></span>
                          <span class="box"></span>
                          Update </label>
                        </div>
                        <div class="md-checkbox">
                          <input type="checkbox"
                          <?php
                            $pos = strpos($acc, '3');

                            if ($pos !== false) {
                                 echo "checked";
                            } else {
                                 echo "";
                            }
                          ?>
                          value="3" name="acc[]" id="delete" class="md-check">
                          <label for="delete">
                          <span></span>
                          <span class="check"></span>
                          <span class="box"></span>
                          Delete </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <?php
                    if(isset($status['form']['icon']) AND $status['form']['icon'] != ""){
                      $valueicon = $status['form']['icon'];
                    }else{
                      $valueicon = $rec['icon'];
                    }
                    ?>
                    <div class="form-group form-md-line-input has-info">
                      <div class="col-md-8">
                        <div class="input-group">
                          <input value="<?=$valueicon?>" name="icon" type="text" class="form-control" id="form_control_1" placeholder="Input Icons">
                          <div class="form-control-focus"></div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <a class=" btn green-haze" data-toggle="modal" href="#long">View Icons</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                  <div class="modal-dialog wrap-list-icon">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Simple Icon List (copy and paste icon to field)</h4>
                      </div>
                      <div class="modal-body">
                        <div class="simplelineicons-demo">
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-user"></span>
                          &nbsp;icon-user </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-user-female"></span>
                          &nbsp;icon-user-female </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-users"></span>
                          &nbsp;icon-users </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-user-follow"></span>
                          &nbsp;icon-user-follow </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-user-following"></span>
                          &nbsp;icon-user-following </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-user-unfollow"></span>
                          &nbsp;icon-user-unfollow </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-trophy"></span>
                          &nbsp;icon-trophy </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-speedometer"></span>
                          &nbsp;icon-speedometer </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-youtube"></span>
                          &nbsp;icon-social-youtube </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-twitter"></span>
                          &nbsp;icon-social-twitter </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-tumblr"></span>
                          &nbsp;icon-social-tumblr </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-facebook"></span>
                          &nbsp;icon-social-facebook </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-dropbox"></span>
                          &nbsp;icon-social-dropbox </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-social-dribbble"></span>
                          &nbsp;icon-social-dribbble </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-shield"></span>
                          &nbsp;icon-shield </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-screen-tablet"></span>
                          &nbsp;icon-screen-tablet </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-screen-smartphone"></span>
                          &nbsp;icon-screen-smartphone </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-screen-desktop"></span>
                          &nbsp;icon-screen-desktop </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-plane"></span>
                          &nbsp;icon-plane </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-notebook"></span>
                          &nbsp;icon-notebook </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-moustache"></span>
                          &nbsp;icon-moustache </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-mouse"></span>
                          &nbsp;icon-mouse </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-magnet"></span>
                          &nbsp;icon-magnet </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-magic-wand"></span>
                          &nbsp;icon-magic-wand </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-hourglass"></span>
                          &nbsp;icon-hourglass </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-graduation"></span>
                          &nbsp;icon-graduation </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-ghost"></span>
                          &nbsp;icon-ghost </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-game-controller"></span>
                          &nbsp;icon-game-controller </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-fire"></span>
                          &nbsp;icon-fire </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-eyeglasses"></span>
                          &nbsp;icon-eyeglasses </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-envelope-open"></span>
                          &nbsp;icon-envelope-open </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-envelope-letter"></span>
                          &nbsp;icon-envelope-letter </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-energy"></span>
                          &nbsp;icon-energy </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-emoticon-smile"></span>
                          &nbsp;icon-emoticon-smile </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-disc"></span>
                          &nbsp;icon-disc </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-cursor-move"></span>
                          &nbsp;icon-cursor-move </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-crop"></span>
                          &nbsp;icon-crop </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-credit-card"></span>
                          &nbsp;icon-credit-card </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-chemistry"></span>
                          &nbsp;icon-chemistry </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bell"></span>
                          &nbsp;icon-bell </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-badge"></span>
                          &nbsp;icon-badge </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-anchor"></span>
                          &nbsp;icon-anchor </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-action-redo"></span>
                          &nbsp;icon-action-redo </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-action-undo"></span>
                          &nbsp;icon-action-undo </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bag"></span>
                          &nbsp;icon-bag </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-basket"></span>
                          &nbsp;icon-basket </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-basket-loaded"></span>
                          &nbsp;icon-basket-loaded </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-book-open"></span>
                          &nbsp;icon-book-open </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-briefcase"></span>
                          &nbsp;icon-briefcase </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bubbles"></span>
                          &nbsp;icon-bubbles </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-calculator"></span>
                          &nbsp;icon-calculator </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-call-end"></span>
                          &nbsp;icon-call-end </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-call-in"></span>
                          &nbsp;icon-call-in </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-call-out"></span>
                          &nbsp;icon-call-out </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-compass"></span>
                          &nbsp;icon-compass </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-cup"></span>
                          &nbsp;icon-cup </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-diamond"></span>
                          &nbsp;icon-diamond </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-direction"></span>
                          &nbsp;icon-direction </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-directions"></span>
                          &nbsp;icon-directions </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-docs"></span>
                          &nbsp;icon-docs </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-drawer"></span>
                          &nbsp;icon-drawer </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-drop"></span>
                          &nbsp;icon-drop </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-earphones"></span>
                          &nbsp;icon-earphones </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-earphones-alt"></span>
                          &nbsp;icon-earphones-alt </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-feed"></span>
                          &nbsp;icon-feed </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-film"></span>
                          &nbsp;icon-film </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-folder-alt"></span>
                          &nbsp;icon-folder-alt </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-frame"></span>
                          &nbsp;icon-frame </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-globe"></span>
                          &nbsp;icon-globe </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-globe-alt"></span>
                          &nbsp;icon-globe-alt </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-handbag"></span>
                          &nbsp;icon-handbag </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-layers"></span>
                          &nbsp;icon-layers </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-map"></span>
                          &nbsp;icon-map </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-picture"></span>
                          &nbsp;icon-picture </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-pin"></span>
                          &nbsp;icon-pin </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-playlist"></span>
                          &nbsp;icon-playlist </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-present"></span>
                          &nbsp;icon-present </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-printer"></span>
                          &nbsp;icon-printer </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-puzzle"></span>
                          &nbsp;icon-puzzle </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-speech"></span>
                          &nbsp;icon-speech </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-vector"></span>
                          &nbsp;icon-vector </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-wallet"></span>
                          &nbsp;icon-wallet </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-arrow-down"></span>
                          &nbsp;icon-arrow-down </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-arrow-left"></span>
                          &nbsp;icon-arrow-left </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-arrow-right"></span>
                          &nbsp;icon-arrow-right </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-arrow-up"></span>
                          &nbsp;icon-arrow-up </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bar-chart"></span>
                          &nbsp;icon-bar-chart </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bulb"></span>
                          &nbsp;icon-bulb </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-calendar"></span>
                          &nbsp;icon-calendar </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-end"></span>
                          &nbsp;icon-control-end </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-forward"></span>
                          &nbsp;icon-control-forward </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-pause"></span>
                          &nbsp;icon-control-pause </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-play"></span>
                          &nbsp;icon-control-play </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-rewind"></span>
                          &nbsp;icon-control-rewind </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-control-start"></span>
                          &nbsp;icon-control-start </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-cursor"></span>
                          &nbsp;icon-cursor </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-dislike"></span>
                          &nbsp;icon-dislike </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-equalizer"></span>
                          &nbsp;icon-equalizer </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-graph"></span>
                          &nbsp;icon-graph </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-grid"></span>
                          &nbsp;icon-grid </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-home"></span>
                          &nbsp;icon-home </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-like"></span>
                          &nbsp;icon-like </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-list"></span>
                          &nbsp;icon-list </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-login"></span>
                          &nbsp;icon-login </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-logout"></span>
                          &nbsp;icon-logout </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-loop"></span>
                          &nbsp;icon-loop </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-microphone"></span>
                          &nbsp;icon-microphone </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-music-tone"></span>
                          &nbsp;icon-music-tone </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-music-tone-alt"></span>
                          &nbsp;icon-music-tone-alt </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-note"></span>
                          &nbsp;icon-note </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-pencil"></span>
                          &nbsp;icon-pencil </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-pie-chart"></span>
                          &nbsp;icon-pie-chart </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-question"></span>
                          &nbsp;icon-question </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-rocket"></span>
                          &nbsp;icon-rocket </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-share"></span>
                          &nbsp;icon-share </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-share-alt"></span>
                          &nbsp;icon-share-alt </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-shuffle"></span>
                          &nbsp;icon-shuffle </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-size-actual"></span>
                          &nbsp;icon-size-actual </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-size-fullscreen"></span>
                          &nbsp;icon-size-fullscreen </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-support"></span>
                          &nbsp;icon-support </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-tag"></span>
                          &nbsp;icon-tag </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-trash"></span>
                          &nbsp;icon-trash </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-umbrella"></span>
                          &nbsp;icon-umbrella </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-wrench"></span>
                          &nbsp;icon-wrench </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-ban"></span>
                          &nbsp;icon-ban </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-bubble"></span>
                          &nbsp;icon-bubble </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-camcorder"></span>
                          &nbsp;icon-camcorder </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-camera"></span>
                          &nbsp;icon-camera </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-check"></span>
                          &nbsp;icon-check </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-clock"></span>
                          &nbsp;icon-clock </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-close"></span>
                          &nbsp;icon-close </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-cloud-download"></span>
                          &nbsp;icon-cloud-download </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-cloud-upload"></span>
                          &nbsp;icon-cloud-upload </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-doc"></span>
                          &nbsp;icon-doc </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-envelope"></span>
                          &nbsp;icon-envelope </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-eye"></span>
                          &nbsp;icon-eye </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-flag"></span>
                          &nbsp;icon-flag </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-folder"></span>
                          &nbsp;icon-folder </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-heart"></span>
                          &nbsp;icon-heart </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-info"></span>
                          &nbsp;icon-info </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-key"></span>
                          &nbsp;icon-key </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-link"></span>
                          &nbsp;icon-link </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-lock"></span>
                          &nbsp;icon-lock </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-lock-open"></span>
                          &nbsp;icon-lock-open </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-magnifier"></span>
                          &nbsp;icon-magnifier </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-magnifier-add"></span>
                          &nbsp;icon-magnifier-add </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-magnifier-remove"></span>
                          &nbsp;icon-magnifier-remove </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-paper-clip"></span>
                          &nbsp;icon-paper-clip </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-paper-plane"></span>
                          &nbsp;icon-paper-plane </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-plus"></span>
                          &nbsp;icon-plus </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-pointer"></span>
                          &nbsp;icon-pointer </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-power"></span>
                          &nbsp;icon-power </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-refresh"></span>
                          &nbsp;icon-refresh </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-reload"></span>
                          &nbsp;icon-reload </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-settings"></span>
                          &nbsp;icon-settings </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-star"></span>
                          &nbsp;icon-star </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-symbol-female"></span>
                          &nbsp;icon-symbol-female </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-symbol-male"></span>
                          &nbsp;icon-symbol-male </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-target"></span>
                          &nbsp;icon-target </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-volume-1"></span>
                          &nbsp;icon-volume-1 </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-volume-2"></span>
                          &nbsp;icon-volume-2 </span>
                          </span>
                          <span class="item-box">
                          <span class="item">
                          <span aria-hidden="true" class="icon-volume-off"></span>
                          &nbsp;icon-volume-off </span>
                          </span>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
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
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/select2/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/backend/global/plugins/bootstrap-select/bootstrap-select.min.js')?>"></script>