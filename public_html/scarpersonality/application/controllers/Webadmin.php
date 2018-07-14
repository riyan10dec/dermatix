<?php
date_default_timezone_set("Asia/Jakarta");
class Webadmin extends CI_Controller {
    
  public function __construct(){
      
    parent::__construct();
    $this->load->library('encrypt');
    //$this->load->helper('url');
    $this->load->helper(array('form', 'url', 'file'));
    $this->segs = $this->uri->segment_array();
  
  }
  
  public function index(){       

    $this->_isLogin();

    $data['menulist'] = $this->_cekAkses();
  
    $limit = 10;

    if (isset($this->segs[4])){

      $start = $this->segs[4];
      $page  = $this->segs[4];
      $no    = $this->segs[4]+1;

    }else{

      $start = 0;
      $no    = 1;
      $page  = '';

    }
    
    $data['active']  = 'dashboard';
    $data['page']    = 'Dashboard';
    $data['act']     = 'default';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $this->load->view('cms/main.php',$data);

  }

  public function login(){

    $data['statuslogin'] = $this->session->userdata('statuslogin');
    if ($data['statuslogin'] == 1) {
      redirect('/webadmin', 'refresh');
      die();
    }
    $this->session->unset_userdata('statuslogin');
    $data['logingagal'] = "";
    
    $data['username'] = $this->session->userdata('username');
    
    $this->load->view('cms/login.html',$data);       

  }
  
  function do_login(){

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $remember = $this->input->post('remember');

    $time = date("Y-m-d H:i:s");  

    if (isset($username) AND $username != '' AND isset($password) AND $password != ''){

      $result = $this->_cekLogin($username,$password);

      if ($result == 1){
        $query = $this->db->query("SELECT id,iddivisi,nama,username,pic FROM `user` WHERE username = '$username'")->result(); 
        
        $newdata = array(
          'username'    => $username,
          'user_id'     => $query[0]->id,
          'divisi'      => $query[0]->iddivisi,
          'nama'        => $query[0]->nama,
          'pic'         => $query[0]->pic,
          'statuslogin' => 1
        );
        
        $this->session->set_userdata($newdata);
        $data = $this->db->query('UPDATE user SET lastlogin = NOW() WHERE id = '.$query[0]->id);
        
        $menuawal = $this->db->query('SELECT * FROM `divisi` where id = '.$this->session->userdata('divisi').' ORDER BY `cretime` asc')->result_array();
        $menuawal = explode(';',$menuawal[0]['idmenu']);
        $menupertama = $this->db->query('SELECT * FROM `menu` where id = '.$menuawal[0].' ORDER BY `cretime` asc')->result_array();
        
        $menupertama2 = explode(' ',strtolower($menupertama[0]['title']));
        if ($remember == 1) {
          echo "bebas";
          redirect('/webadmin', 'refresh');
        }
        redirect('/webadmin', 'refresh');
      
      }else{
          
        $datasalah = array(
          'username' => $username,
          'statuslogin' => "gagal"
        );
        $this->session->set_userdata($datasalah);
        $data['logingagal'] = $this->session->userdata('statuslogin');

        redirect('/webadmin/login', 'refresh');
      }
    }else{
      redirect('/webadmin/login', 'refresh');
    }

  }

  function _cekLogin($username,$password){

    $username = $username;
    $password = sha1(MD5($password));
    $query = $this->db->query("SELECT * FROM `user` WHERE username = '$username' AND password = '$password'"); 
    
    return $query->num_rows();        

  }
  
  function _isLogin(){
    
    $username    = $this->session->userdata('username');         
    $statuslogin = $this->session->userdata('statuslogin');

    if (!isset($username) or $username == "" or !isset($statuslogin) or $statuslogin == 0){
      redirect('/webadmin/login', 'refresh');
      die();
    }
  }

  function _cekAkses(){
    
    $menulist = $this->db->query('SELECT id,idmenu FROM `divisi` where id = '.$this->session->userdata('divisi').' ORDER BY `cretime` asc')->result_array();

    $menulist = str_replace(';',',',$menulist[0]['idmenu']);
    $menu = $this->db->query('SELECT id,title,link,submenu,icon FROM `menu` where id IN ('.$menulist.') and parent = 0 AND hapus = 0 ORDER BY `posisi` asc')->result_array();

    $r = 0;
    foreach ($menu as $rowsub) {
      $submenu[$r] = $this->db->query('SELECT id,title,link,submenu,icon FROM `menu` where id IN ('.$menulist.') and parent = '.$rowsub['id'].' AND hapus = 0 ORDER BY `posisi` asc')->result_array();

    $r++;
    }
    
    return array($menu,$submenu);
  }

  function _cekPermit($idmenu){

    $iddivuser = $this->session->userdata('divisi');

    $cekPermit = $this->db->query('SELECT isview,isadd,isupdate,isdelete FROM `detail_divisi` WHERE iddivisi = '.$iddivuser.' and idmenu = '.$idmenu.' ORDER BY `cretime` desc')->result();

    if(isset($cekPermit[0])){
      return $cekPermit[0];
    }else{
      redirect('/webadmin/', 'refresh');
    }
  }
  
  function _ispermit($valpermit){
    if($valpermit != 1){
      redirect('/webadmin/', 'refresh');
    }
  }

  public function logout(){
    
    $this->session->sess_destroy();
    redirect('/webadmin/login', 'refresh');

  }
  
  function reorder_menu(){
    $table = $this->input->post('table');
    $id = json_decode($this->input->post('id'), true);
    $posisi = 1;
    foreach ($id as $row) {
     // echo $row['id'];
      $data = array();
      $editdata = array(            

        'posisi' => $posisi,
        'parent' => 0,


      );                    

      $this->db->where('id', $row['id']);
      $edit = $this->db->update($table, $editdata);   
      $posisi++;

      $child = 1;
      if (isset($row['children'])) {
        foreach ($row['children'] as $row2) {
          $data = array();
          $editdata2 = array(            

            'posisi'  => $child,
            'parent' => $row['id'],
            'submenu' => 0

          );
          $this->db->where('id', $row2['id']);
          $edit = $this->db->update($table, $editdata2); 
          $child++;
        }
      }
    }
  }

  function reorder_list(){
    $table = $this->input->post('table');
    $id = json_decode($this->input->post('id'), true);
    $posisi = 1;
    foreach ($id as $row) {
      $data = array();
      $editdata = array(            

        'posisi' => $posisi

      );                    

      $this->db->where('id', $row['id']);
      $edit = $this->db->update($table, $editdata);   
      $posisi++;

    }
  }

  function edittable(){

    $status = $this->input->post('status');
    $table  = $this->input->post('table');
    $title  = $this->input->post('title');
    $link   = strtolower(preg_replace('/[^a-zA-Z0-9-]/', '', $title));
    
    if($status == 'save'){
      $inputdata = array(            

        'title'   => $title,
        'link'    => $link,
        'cretime' => date('Y-m-d H:i:s'),
        'creby'   => $this->session->userdata('username')

      );     

      $saved = $this->db->insert($table, $inputdata);

      if($saved){
        echo $this->db->insert_id();
      }

    }elseif($status == 'update'){
      $id = $this->input->post('id');
      
      $editdata = array(            

        'title'   => $title,
        'link'    => $link,
        'modtime' => date('Y-m-d H:i:s'),
        'modby'   => $this->session->userdata('username')

      );     

      $this->db->where('id', $id);
      $edit = $this->db->update($table, $editdata); 
      if($edit){
        echo $id;
      }
    }elseif($status == 'trash'){
      //print_r($_POST);
      $id = $this->input->post('id');
      
      $editdata = array(            

        'hapus'   => 1,
        'modtime' => date('Y-m-d H:i:s'),
        'modby'   => $this->session->userdata('username')

      );     

      $this->db->where('id', $id);
      $edit = $this->db->update($table, $editdata); 
      if($edit){
        echo $id;
      } 
    }elseif($status == 'restore'){
      //print_r($_POST);
      $id = $this->input->post('id');
      
      $editdata = array(            

        'hapus'   => 0,
        'modtime' => date('Y-m-d H:i:s'),
        'modby'   => $this->session->userdata('username')

      );     

      $this->db->where('id', $id);
      $edit = $this->db->update($table, $editdata); 
      if($edit){
        echo $id;
      } 
    }
    elseif($status == 'delete'){
      //print_r($_POST);
      $id = $this->input->post('id');
      
      $deleted = $this->deleteData($table,$id);     

      if($deleted){
        echo $id;
      } 
    }

  }

  public function profile(){  

    $login = $this->_isLogin();
    $data['menulist'] = $this->_cekAkses();     

    $form = $this->input->post('form');
    if (isset($form) AND $form == 1 ){

      $status = $this->_edit_ubahpass();
      $data['status'] = $status;
    }

    $data_user = $this->db->query('SELECT id,iddivisi,username,nama,pic FROM `user` WHERE id = '.$this->session->userdata('user_id'))->result_array();

    $data['user'] = $data_user[0];

    $data['active']  = 'profile';
    $data['page']    = 'Profile';
    $data['tipe']    = '';
    $data['active2'] = '';
    $data['act']     = 'default';
    $data['submenu'] = FALSE;


    $this->load->view('cms/main.php',$data);
  }
    
  function _edit_ubahpass(){

    $usernameold   = $this->input->post('usernameold');
    $username      = $this->input->post('username');
    $oldpassword   = $this->input->post('oldpassword');
    $newpassword   = $this->input->post('newpassword');
    $renewpassword = $this->input->post('renewpassword');
    $fullname      = $this->input->post('fullname');
    $pic           = $this->input->post('pic');

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;
    $pass    = TRUE;

    if($usernameold != $username){

      $cek_username = $this->db->query('SELECT count(*) as jumlah FROM `user` where username= "'.$username.'"')->result(); 

      if ($cek_username[0]->jumlah == 1) {
        $success = FALSE;
        $step1   = FALSE;
        $notice  .= "<li>Username : Someone already has that username</li>";
      }

    }
    
    $query = $this->db->query('SELECT id,password,pic FROM `user` WHERE id = '.$this->session->userdata('user_id'))->result();
    
    if($oldpassword != '' OR $newpassword != '' OR $renewpassword != ''){

      $password = sha1(MD5($oldpassword));

      $passlamadb = $query[0]->password;
      $passlama = sha1(MD5($oldpassword));

      if($passlamadb != $passlama){
        $success = FALSE;
        $step1   = FALSE;
        $pass    = FALSE;
        $notice  .= "<li>Old Password : Wrong Old Password</li>";
      }elseif($newpassword != $renewpassword){
        $success = FALSE;
        $step1   = FALSE;
        $pass    = FALSE;
        $notice  .= "<li>Password : New Password and Confirm New Password must same</li>";
      }
    }

    if(!isset($username) OR $username == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Username : Must be filled</li>";
    }

    if(!isset($fullname) OR $fullname == ''){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Fullname : Must be filled</li>";
    }

    $picname = $query[0]->pic;

    

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '') { 
      // print_r($_FILES);
      // echo "masuk sini bro";
      // die();
      $folder       = 'user';
      $filename     = $username;
      $fieldname    = 'pic';
      $width        = 29;
      $height       = 29;
      $resizable    = TRUE;
      $create_thumb = FALSE;


      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname = $hasilupload['filename'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        //$picname = "";
      }

    } 
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      if($pass == TRUE AND $newpassword !=""){
        $editdata = array(            

          'username' => $username,
          'nama'     => $fullname, 
          'password' => sha1(MD5($newpassword)), 
          'pic'      => $picname,
          'modtime'  => date('Y-m-d H:i:s')
        
        );
      }else{
        $editdata = array(            

          'username' => $username,
          'nama'     => $fullname, 
          'pic'      => $picname,
          'modtime'  => date('Y-m-d H:i:s')
        
        );
      }     

      $this->db->where('id', $this->session->userdata('user_id'));
      $edit = $this->db->update('user', $editdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'username' => $username,
        'fullname' => $fullname,
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }
  }

  function tes(){
    print_r($_POST);
    die();
  }

  function countPublish($table){
    $count = $this->db->query('SELECT count(id) as jumlah FROM `'.$table.'` where hapus = 0 AND draft = 0')->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }
  function countPublishdate($table){
    $datenow = date('Y-m-d H:i:s');
    $count = $this->db->query("SELECT count(id) as jumlah FROM `".$table."` where hapus = 0 AND draft = 0 and datestart <= '".$datenow."' and dateend >= '".$datenow."'")->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }
  function countScheduling($table){
    $datenow = date('Y-m-d H:i:s');
    $count = $this->db->query("SELECT count(id) as jumlah FROM `".$table."` where hapus = 0 AND draft = 0 and datestart >= '".$datenow."'")->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }
  function countExpired($table){
    $datenow = date('Y-m-d H:i:s');
    $count = $this->db->query("SELECT count(id) as jumlah FROM `".$table."` where hapus = 0 AND draft = 0 and dateend <= '".$datenow."'")->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }
  function countTrash($table){
    $count = $this->db->query('SELECT count(id) as jumlah FROM `'.$table.'` where hapus = 1')->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }

  function countDraft($table){
    $count = $this->db->query('SELECT count(id) as jumlah FROM `'.$table.'` where hapus = 0 and draft = 1')->result();
    $hasil = $count[0]->jumlah;
    return $hasil;
  }

  function trashData($tablename,$id){

    $query = $this->db->query('UPDATE '.$tablename.' SET hapus = 1 WHERE id = "'.$id.'"'); 
          
    if ($query){
      return 1;
    }else{
      return 0;
    }

  }

  function publishData($tablename,$id){

    $query = $this->db->query('UPDATE '.$tablename.' SET hapus = 0, draft = 0 WHERE id = "'.$id.'"'); 
          
    if ($query){
      return 1;
    }else{
      return 0;
    }

  }

  function draftData($tablename,$id){

    $query = $this->db->query('UPDATE '.$tablename.' SET hapus = 0, draft = 1 WHERE id = "'.$id.'"'); 
          
    if ($query){
      return 1;
    }else{
      return 0;
    }

  }

  function restoreData($tablename,$id){

    $query = $this->db->query('UPDATE '.$tablename.' SET hapus = 0 WHERE id = "'.$id.'"'); 
          
    if ($query){
      return 1;
    }else{
      return 0;
    }

  }
  
  function deleteData($tablename,$id){

    $query = $this->db->query('DELETE FROM '.$tablename.' where id = "'.$id.'"'); 
    
    if ($query){
      return 1;
    }else{
      return 0;
    }

  }

  function visible(){
    
    if($_POST['status'] == 0){
      $query = $this->db->query('UPDATE '.$_POST['from'].' SET status = 1 WHERE id = "'.$_POST['post'].'"'); 
      $status = 1;
    }else{
      $query = $this->db->query('UPDATE '.$_POST['from'].' SET status = 0 WHERE id = "'.$_POST['post'].'"'); 
      $status = 0;
    }
    
    if ($query){
      echo $status;
    }else{
      echo 2;
    }

  }

  function ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable){

    $config['upload_path']   = './assets/images/'.$folder;
    $config['file_name']     = $filename;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['overwrite']     = TRUE;
    
    
    //$this->load->library('upload', $config);
    $this->upload->initialize($config);

    $field_name = $fieldname;
    
    if ( !$this->upload->do_upload($field_name)){

      $success = FALSE;
      $step1   = FALSE;
      $notice  = $this->upload->display_errors('<li>Picture :','</li>');

      return $arrayName = array('status' => FALSE, 'success' => $success, 'step1' => $step1, 'notice' => $notice);
    
    }else{

      $dataupload = $this->upload->data();

      if($resizable == TRUE){

        if($dataupload['image_width'] != $width OR $dataupload['image_height'] != $height){

          $ratio = ($dataupload['image_width'] / $dataupload['image_height']) - ($width / $height);

          $full_path = $dataupload['full_path'];

          if($ratio == 0){

            $resize = $this->resize_img($full_path,$width,$height,'auto');

            if ($create_thumb['status'] == TRUE) {

              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }elseif($ratio > 0){

            $resize = $this->resize_img($full_path,$width,$height,'height');
            $size   = getimagesize($full_path);

            $y_axis = 0;
            $x_axis = ($size[0]-$width)/2;

            $crop   = $this->crop_img($full_path,$width,$height,$x_axis,$y_axis);

            if ($create_thumb['status'] == TRUE) {

              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }elseif($ratio < 0){

            $resize = $this->resize_img($full_path,$width,$height,'width');
            $size   = getimagesize($full_path);
            
            $x_axis = 0;
            $y_axis = ($size[1]-$height)/2;

            $crop   = $this->crop_img($full_path,$width,$height,$x_axis,$y_axis);

            if ($create_thumb['status'] == TRUE) {
              
              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }

        }else{

          if ($create_thumb['status'] == TRUE) {

            $full_path = $dataupload['full_path'];
            $thumb = $this->awal_thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

          }
        }
      }

      return $arrayName = array('status' => TRUE, 'filename' => $dataupload['file_name'], 'thumbname' => $dataupload['raw_name'].'_small'.$dataupload['file_ext']);
    }
  }

  function ryan_img_upload2($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable){

    $config['upload_path']   = './assets/images/'.$folder;
    $config['file_name']     = $filename;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['overwrite']     = TRUE;
    
    
    //$this->load->library('upload', $config);
    $this->upload->initialize($config);

    $field_name = $fieldname;
    
    if ( !$this->upload->do_upload($field_name)){

      $success = FALSE;
      $step1   = FALSE;
      $notice  = $this->upload->display_errors('<li>Picture :','</li>');

      return $arrayName = array('status' => FALSE, 'success' => $success, 'step1' => $step1, 'notice' => $notice);
    
    }else{

      $dataupload = $this->upload->data();

      if($resizable == TRUE){

        if($dataupload['image_width'] != $width OR $dataupload['image_height'] != $height){

          $ratio = ($dataupload['image_width'] / $dataupload['image_height']) - ($width / $height);

          $full_path = $dataupload['full_path'];

          if($ratio == 0){

            $resize = $this->resize_img($full_path,$width,$height,'auto');

            if ($create_thumb['status'] == TRUE) {

              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }elseif($ratio > 0){

            $resize = $this->resize_img($full_path,$width,$height,'height');
            $size   = getimagesize($full_path);

            $y_axis = 0;
            $x_axis = ($size[0]-$width)/2;

            $crop   = $this->crop_img($full_path,$width,$height,$x_axis,$y_axis);

            if ($create_thumb['status'] == TRUE) {

              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }elseif($ratio < 0){

            $resize = $this->resize_img($full_path,$width,$height,'width');
            $size   = getimagesize($full_path);
            
            $x_axis = 0;
            $y_axis = ($size[1]-$height)/2;

            $crop   = $this->crop_img($full_path,$width,$height,$x_axis,$y_axis);

            if ($create_thumb['status'] == TRUE) {
              
              $thumb = $this->thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

            }

          }

        }else{

          if ($create_thumb['status'] == TRUE) {

            $full_path = $dataupload['full_path'];
            $thumb = $this->awal_thumb_img($full_path,$create_thumb['width'],$create_thumb['height']);

          }
        }
      }

      return $arrayName = array('status' => TRUE, 'filename' => $dataupload['file_name'], 'thumbname' => $dataupload['raw_name'].'_small'.$dataupload['file_ext']);
    }
  }

  function resize_img($full_path,$width,$height,$master_dim){

    $configresize['image_library']  = 'gd2';
    $configresize['source_image']   = $full_path;
    $configresize['maintain_ratio'] = TRUE;
    $configresize['width']          = $width;
    $configresize['height']         = $height;
    $configresize['master_dim']     = $master_dim;

    $this->load->library('image_lib', $configresize);

    $this->image_lib->initialize($configresize);

    $resize = $this->image_lib->resize();

    $this->image_lib->clear();

    return $resize;
  }

  function awal_thumb_img($full_path,$width,$height){

    $configthumb['image_library']  = 'gd2';
    $configthumb['source_image']   = $full_path;
    $configthumb['maintain_ratio'] = TRUE;
    $configthumb['create_thumb']   = TRUE;
    $configthumb['width']          = $width;
    $configthumb['height']         = $height;
    $configthumb['thumb_marker']   = '_small';


    $this->load->library('image_lib', $configthumb);
    //$this->image_lib->initialize($configthumb); 

    $thumb1 = $this->image_lib->resize();

    $this->image_lib->clear();

    return $thumb1;

  }

  function thumb_img($full_path,$width,$height){

    $configthumb['image_library']  = 'gd2';
    $configthumb['source_image']   = $full_path;
    $configthumb['maintain_ratio'] = TRUE;
    $configthumb['create_thumb']   = TRUE;
    $configthumb['width']          = $width;
    $configthumb['height']         = $height;
    $configthumb['thumb_marker']   = '_small';


    //$this->load->library('image_lib', $configthumb);
    $this->image_lib->initialize($configthumb); 

    $thumb1 = $this->image_lib->resize();

    $this->image_lib->clear();

    return $thumb1;

  }

  function crop_img($full_path,$width,$height,$x_axis,$y_axis){
    
    $configcrop['image_library']  = 'gd2';
    $configcrop['source_image']   = $full_path;
    $configcrop['maintain_ratio'] = FALSE;
    $configcrop['x_axis']         = $x_axis;
    $configcrop['y_axis']         = $y_axis;
    $configcrop['height']         = $height;
    $configcrop['width']          = $width;

    $this->image_lib->initialize($configcrop); 

    $crop = $this->image_lib->crop();

    $this->image_lib->clear();

    return $crop;
  }

  public function multiple_upload() {

    // print_r($_POST);
    // die();

    $filenameold   = strtolower($_FILES['userfile']['name']);
    $file_edit     = str_replace(" ","_",$filenameold);
    $random_digit  = rand(000,999);
    $new_file_name = $random_digit."_".$file_edit;

    $upload_path_url = base_url().'assets/images/galcom/';

    $config['upload_path']   = './assets/images/galcom';
    $config['file_name']     = $new_file_name;
    $config['allowed_types'] = 'gif|jpg|png';

    $this->upload->initialize($config);
    //$this->load->library('upload', $config);

    $field_name = 'userfile';

    if (!$this->upload->do_upload($field_name)) {
        $error = array('error' => $this->upload->display_errors());
        //$this->load->view('upload', $error);
        //Load the list of existing files in the upload directory
        $existingFiles = get_dir_file_info($config['upload_path']);
        $foundFiles = array();
        $f=0;
        foreach ($existingFiles as $fileName => $info) {
          if($fileName!='thumbs'){//Skip over thumbs directory
            //set the data for the json array   
            $foundFiles[$f]['name'] = $fileName;
            $foundFiles[$f]['size'] = $info['size'];
            $foundFiles[$f]['url'] = $upload_path_url . $fileName;
            $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
            $foundFiles[$f]['deleteUrl'] = base_url() . 'webadmin/deleteImage/' . $fileName;
            $foundFiles[$f]['deleteType'] = 'DELETE';
            $foundFiles[$f]['error'] = null;

            $f++;
          }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('files' => $foundFiles)));
    } else {
      $data = $this->upload->data();
      /*
       * Array
        (
        [file_name] => png1.jpg
        [file_type] => image/jpeg
        [file_path] => /home/ipresupu/public_html/uploads/
        [full_path] => /home/ipresupu/public_html/uploads/png1.jpg
        [raw_name] => png1
        [orig_name] => png.jpg
        [client_name] => png.jpg
        [file_ext] => .jpg
        [file_size] => 456.93
        [is_image] => 1
        [image_width] => 1198
        [image_height] => 1166
        [image_type] => jpeg
        [image_size_str] => width="1198" height="1166"
        )
       */
      // to re-size for thumbnail images un-comment and set path here and in json array
      $configresizemul = array();
      $configresizemul['image_library'] = 'gd2';
      $configresizemul['source_image'] = $data['full_path'];
      $configresizemul['new_image'] = $data['file_path'] . 'thumbs/';
      $configresizemul['maintain_ratio'] = TRUE;
      $configresizemul['width'] = 75;
      $configresizemul['height'] = 50;

      $this->load->library('image_lib', $configresizemul);
      $tesresize = $this->image_lib->resize();

      // $this->image_lib->clear();
      // var_dump($tesresize);
      // die();


      //set the data for the json array
      $info = new StdClass;
      $info->name = $data['file_name'];
      $info->size = $data['file_size'] * 1024;
      $info->type = $data['file_type'];
      $info->url = $upload_path_url . $data['file_name'];
      // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
      $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
      $info->deleteUrl = base_url() . 'webadmin/deleteImage/' . $data['file_name'];
      $info->deleteType = 'POST';
      $info->error = null;

      $files[] = $info;
      //this is why we put this in the constants to pass only json data
      if (IS_AJAX) {
          echo json_encode(array("files" => $files));
          //this has to be the only data returned or you will get an error.
          //if you don't give this a json array it will give you a Empty file upload result error
          //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
          // so that this will still work if javascript is not enabled
      } else {
          $file_data['upload_data'] = $this->upload->data();
          //$this->load->view('upload/upload_success', $file_data);
      }
    }
  }

  public function deleteImage() {//gets the job done but you might want to add error checking and security
    $file = $this->segs[3];
    $success = unlink(FCPATH . 'assets/images/galcom/' . $file);
    $success = unlink(FCPATH . 'assets/images/galcom/thumbs/' . $file);
    //info to see if it is doing what it is supposed to
    $info = new StdClass;
    $info->sucess = $success;
    $info->path = base_url() . 'assets/images/galcom/' . $file;
    $info->file = is_file(FCPATH . 'assets/images/galcom/' . $file);

    if (IS_AJAX) {
        //I don't think it matters if this is set but good for error checking in the console/firebug
        echo json_encode(array($info));
    } else {
        //here you will need to decide what you want to show for a successful delete        
        $file_data['delete_data'] = $file;
        //$this->load->view('admin/delete_success', $file_data);
    }
  }

  public function menu(){       

    $login = $this->_isLogin();

    $permit = $this->_cekPermit(3);

    $data['permit'] = $permit;

    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){          

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');
          if (isset($form) AND $form == 1 ){

            $status = $this->_save_menu();
            $data['status'] = $status;
            // echo "<pre>";
            // print_r($status);
          }

          $data['menuparent'] = $this->db->query('SELECT id,title FROM `menu` WHERE parent = 0 ORDER BY `posisi` asc')->result_array(); 
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_menu();
              $data['status'] = $status;
              // echo "<pre>";
              // print_r($status);
            }

            $data_rec = $this->db->query('SELECT id,title,parent,link,submenu,akses,icon FROM `menu` WHERE id = '.$this->segs[5])->result_array(); 

            $data['menuparent'] = $this->db->query('SELECT id,title FROM `menu` WHERE parent = 0 ORDER BY `posisi` asc')->result_array(); 

            if ($data_rec) {
              $data['rec'] = $data_rec[0];
            } else {
              redirect('/webadmin/menu', 'refresh');
            }
            
            

          } else {
            redirect('/webadmin/menu', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('menu',$this->segs[5]);

            if ($deleted){

              redirect('/webadmin/menu/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/menu', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('menu',$this->segs[5]);

            if ($restore){

              redirect('/webadmin/menu/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/menu', 'refresh');
          }

        }elseif ($this->segs[4] == 'trash'){

          $this->_ispermit($permit->isdelete);
          
          $hide = $this->db->query('UPDATE menu SET hapus = 1 WHERE id = "'.$this->segs[5].'"'); 
          
          if ($hide){

            redirect('/webadmin/menu', 'refresh');

          }

        }else{
          redirect('/webadmin/menu', 'refresh');
        }
      }else{
        redirect('/webadmin/menu', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      if (isset($this->segs[3]) AND $this->segs[3] == 'trash') {
        $sqlwhere = 'and hapus = 1';
        $data['statuspage'] = 'trash';
      } else {
        $sqlwhere = 'and parent = 0 and hapus = 0 and draft = 0';
        $data['statuspage'] = 'publish';
      }
      

      $data_rec = $this->db->query('SELECT id,title FROM `menu` where 1=1 '.$sqlwhere.' order by posisi asc')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `menu` where 1=1 '.$sqlwhere.' order by posisi asc')->result();

      if ($data['statuspage'] == 'publish') {

        $urutanchild = 0;
        foreach ($data_rec as $parent) {
          $datachild[$urutanchild] = $this->db->query('SELECT id,title FROM `menu` where parent = '.$parent["id"].' and hapus = 0 and draft = 0 order by posisi asc')->result_array();
          $urutanchild++;
        }
        $data['child'] = $datachild;
        
      }    
        
      $data['rec']   = $data_rec;
      $data['act']   = 'default';
      $data['jumlahdata'] = $data_count[0]->jumlah;
      
      $data['count_publish'] = $this->countPublish('menu');
      $data['count_trash'] = $this->countTrash('menu');

    }

    $data['active']  = 'menu';
    $data['page']    = 'Menu';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

  $this->load->view('cms/main.php',$data); 

  }
    
  function _save_menu(){

    $title    = $this->input->post('title');
    $idparent = $this->input->post('idparent');
    $link     = $this->input->post('link');
    $submenu  = $this->input->post('submenu');
    $accpost  = $this->input->post('acc');
    $icon     = $this->input->post('icon');

    
    $acc = '';
    if (isset($accpost) and $accpost != "") {
      foreach ($accpost as $value) {
        $acc = $acc.$value.";";
      }
    }
    
    if($submenu == 1){
      $acc = '0;';
    }
    if($submenu == ''){
      $submenu = '0';
    }
    $notice = "";
    $success = true;
    //echo $title;
    if(isset($title) AND $title != ''){
    }else{
      $success = false;
      $notice .= "<li>Title : Must be filled</li>";
    }

    if(isset($idparent) AND $idparent != '' AND is_numeric($idparent)){
    }else{
      $success = false;
      $notice .= "<li>Menu Parent : Must be filled</li>";
    }

    if(!isset($submenu) or $submenu == 0){
      if(isset($link) AND $link != ''){
      }else{
        $success = false;
        $notice .= "<li>Link URL : Must be filled</li>";
      }
    }

    if(isset($icon) AND $icon != ''){
    }else{
      $success = false;
      $notice .= "<li>Icon : Must be filled</li>";
    }

    if($success == true){
      $posisi = $this->db->count_all('menu');
      $posisi = $posisi+1;

      if($idparent != '0' ){
        $submenu = 0;
      }
      if($submenu != '0'){
        $link = '';
      }
      $data = array();
      $inputdata = array(            

        'title'   => $title,
        'parent'  => $idparent, 
        'link'    => $link,
        'submenu' => $submenu,
        'akses'   => substr($acc, 0, -1),
        'posisi'  => $posisi,
        'icon'    => $icon,
        'cretime' => date('Y-m-d H:i:s')

      
      );     
      // print_r($inputdata);
      // die();

      $saved = $this->db->insert('menu', $inputdata);
        
      if ($saved){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{

      $form = array(

        'title'    => $title,
        'idparent' => $idparent,
        'link'     => $link,
        'submenu'  => $submenu,
        'acc'      => substr($acc, 0, -1),
        'icon'     => $icon
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
    
  function _edit_menu(){

    $title = $this->input->post('title');
    $idparent = $this->input->post('idparent');
    $link = $this->input->post('link');
    $submenu = $this->input->post('submenu');
    $accpost = $this->input->post('acc');
    $icon = $this->input->post('icon');

    
    $acc = '';
    if (isset($accpost) and $accpost != "") {
      foreach ($accpost as $value) {
        $acc = $acc.$value.";";
      }
    }

    if($submenu == 1){
      $acc = '0;';
    }
    if($submenu == ''){
      $submenu = '0';
    }
    $notice = "";
    $success = true;
    //echo $title;
    if(isset($title) AND $title != ''){
    }else{
      $success = false;
      $notice .= "<li>Title : Must be filled</li>";
    }

    if(isset($idparent) AND $idparent != '' AND is_numeric($idparent)){
    }else{
      $success = false;
      $notice .= "<li>Menu Parent : Must be filled</li>";
    }

    if(!isset($submenu) or $submenu == 0){
      if(isset($link) AND $link != ''){
      }else{
        $success = false;
        $notice .= "<li>Link URL : Must be filled</li>";
      }
    }

    if(isset($icon) AND $icon != ''){
    }else{
      $success = false;
      $notice .= "<li>Icon : Must be filled</li>";
    }

    if($success == true){
      $posisi = $this->db->count_all('menu');
      $posisi = $posisi+1;

      if($idparent != '0' ){
        $submenu = 0;
      }
      if($submenu != '0'){
        $link = '';
      }
      $data = array();
      $editdata = array(            

        'title'   => $title,
        'parent'  => $idparent, 
        'link'    => $link,
        'submenu' => $submenu,
        'akses'   => substr($acc, 0, -1),
        'icon'    => $icon,
        'modtime' => date('Y-m-d H:i:s')

      
      );     
      // print_r($inputdata);
      // die();
      $this->db->where('id', $this->segs[5]);
      $edit = $this->db->update('menu', $editdata); 
      //$saved = $this->db->insert('menu', $inputdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{

      $form = array(

        'title'    => $title,
        'idparent' => $idparent,
        'link'     => $link,
        'submenu'  => $submenu,
        'acc'      => substr($acc, 0, -1),
        'icon'     => $icon
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
    
  public function divisi(){       

    $login = $this->_isLogin();

    $permit = $this->_cekPermit(2);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');
          if (isset($form) AND $form == 1 ){

            $status = $this->_save_divisi();
            $data['status'] = $status;
          }

          $data_rec = $this->db->query('SELECT id,title,posisi,akses FROM `menu` where parent = 0 and hapus = 0 and draft = 0 order by posisi asc')->result_array();

          $urutanchild = 0;
          foreach ($data_rec as $parent) {
            $datachild[$urutanchild] = $this->db->query('SELECT id,title,posisi,akses FROM `menu` where parent = '.$parent["id"].' and hapus = 0 and draft = 0 order by posisi asc')->result_array();
            $urutanchild++;
          }

          $data['rec'] = $data_rec;
          $data['child'] = $datachild;
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_divisi();
              $data['status'] = $status;
            }

            $data_divisi = $this->db->query('SELECT id,title,idmenu FROM `divisi` where id = '.$this->segs[5].' order by cretime asc')->result_array();

            $listmenu = str_replace(';',',',$data_divisi[0]['idmenu']);
            
            $data_akses = $this->db->query('SELECT id,iddivisi,idmenu,isadd,isupdate,isdelete FROM `detail_divisi` where idmenu IN ('.$listmenu.') and iddivisi = '.$this->segs[5].' ORDER BY `cretime` asc')->result_array();

            $addid = '';
            $updateid = '';
            $deleteid = '';

            foreach ($data_akses as $row) {
              if($row['isadd'] == 1){
                $addid = $addid.$row['idmenu'].";";
                
              }
              if($row['isupdate'] == 1){
                $updateid = $updateid.$row['idmenu'].";";
              }
              if($row['isdelete'] == 1){
                $deleteid = $deleteid.$row['idmenu'].";";
              }
            }

            $data['addid']    = substr($addid, 0, -1);
            $data['updateid'] = substr($updateid, 0, -1);
            $data['deleteid'] = substr($deleteid, 0, -1);

            if ($data_divisi) {
              $data['data_divisi'] = $data_divisi[0];
            } else {
              redirect('/webadmin/divisi', 'refresh');
            }
            
            $data_rec = $this->db->query('SELECT id,title,posisi,akses FROM `menu` where parent = 0 and hapus = 0 and draft = 0 order by posisi asc')->result_array();

            $urutanchild = 0;
            foreach ($data_rec as $parent) {
              $datachild[$urutanchild] = $this->db->query('SELECT id,title,posisi,akses FROM `menu` where parent = '.$parent["id"].' and hapus = 0 and draft = 0 order by posisi asc')->result_array();
              $urutanchild++;
            }

            $data['rec'] = $data_rec;
            $data['child'] = $datachild;

          } else {
            redirect('/webadmin/divisi', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('divisi',$this->segs[5]);

            if ($deleted){

              redirect('/webadmin/divisi/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/divisi', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('divisi',$this->segs[5]);

            if ($restore){

              redirect('/webadmin/divisi/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/divisi', 'refresh');
          }

        }elseif ($this->segs[4] == 'trash'){

          $this->_ispermit($permit->isdelete);

          $hide = $this->db->query('UPDATE divisi SET hapus = 1 WHERE id = "'.$this->segs[5].'"'); 
          
          if ($hide){

            redirect('/webadmin/divisi', 'refresh');

          }

        }else{
          redirect('/webadmin/divisi', 'refresh');
        }
      }else{
        redirect('/webadmin/divisi', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      if (isset($this->segs[3]) AND $this->segs[3] == 'trash') {
        $sqlwhere = 'and hapus = 1';
        $data['statuspage'] = 'trash';
      } else {
        $sqlwhere = 'and hapus = 0 and draft = 0';
        $data['statuspage'] = 'publish';
      }

      $data_rec = $this->db->query('SELECT id,title FROM `divisi` where 1=1 '.$sqlwhere.' order by cretime asc')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `divisi` where 1=1 '.$sqlwhere.' order by cretime asc')->result();        
      
      $data['rec']   = $data_rec;
      $data['active'] = 'divisi';
      $data['active2'] = '';
      $data['tipe'] = '';
      $data['act'] = 'default';
      $data['count_publish'] = $this->countPublish('divisi');
      $data['count_trash'] = $this->countTrash('divisi');
          
    }

    $data['active'] = 'divisi';
    $data['page'] = 'Divisi';
    $data['tipe'] = '';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $this->load->view('cms/main.php',$data); 

  }
    
  function _save_divisi(){

    $title = $this->input->post('title');
    $accview = $this->input->post('accview');
    $accadd = $this->input->post('accadd');
    $accupdate = $this->input->post('accupdate');
    $accdelete = $this->input->post('accdelete');

    $viewid = "";
    foreach ($accview as $key => $value) {
      $viewid = $viewid.$key.";";
    }
    $viewid = substr($viewid, 0, -1);

    
    $addid = "";
    if (isset($accadd) AND $accadd != '') {
      foreach ($accadd as $key => $value) {
        $addid = $addid.$key.";";
      }
      $addid = substr($addid, 0, -1);
    }
    
    $updateid = "";
    if (isset($accupdate) AND $accupdate != '') {
      foreach ($accupdate as $key => $value) {
        $updateid = $updateid.$key.";";
      }
      $updateid = substr($updateid, 0, -1);
    }

    $deleteid = "";
    if (isset($accdelete) AND $accdelete != '') {
      foreach ($accdelete as $key => $value) {
        $deleteid = $deleteid.$key.";";
      }
      $deleteid = substr($deleteid, 0, -1);
    }

    $notice = "";
    $success = true;

    if(isset($title) AND $title != ''){
    }else{
      $success = false;
      $notice .= "<li>Title : Must be filled</li>";
    }

    if(isset($accview) AND $accview != ''){
    }else{
      $success = false;
      $notice .= "<li>Access : Must choose 1 access page</li>";
    }

    if($success == true){

      $data = array();
      $inputdata = array(            

        'title'   => $title,
        'idmenu'   => $viewid,
        'cretime' => date('Y-m-d H:i:s')
      
      );     

      $saved = $this->db->insert('divisi', $inputdata);
      $iddivisi = $this->db->insert_id();
      
      $menu = $this->db->query('SELECT id FROM `menu` order by cretime asc')->result_array();

      foreach ($menu as $idmenu) {

        $key = $idmenu['id'];

        if (isset($accview[$key]) AND $accview[$key] != "") {
          $isview = 1;
        }else{
          $isview = 0;
        }
        if (isset($accadd[$key]) AND $accadd[$key] != "") {
          $isadd = 1;
        }else{
          $isadd = 0;
        }
        if (isset($accupdate[$key]) AND $accupdate[$key] != "") {
          $isupdate = 1;
        }else{
          $isupdate = 0;
        }
        if (isset($accdelete[$key]) AND $accdelete[$key] != "") {
          $isdelete = 1;
        }else{
          $isdelete = 0;
        }
        $inputdata2 = array(            

          'iddivisi' => $iddivisi,
          'idmenu'   => $key,
          'isview'    => $isview,
          'isadd'    => $isadd,
          'isupdate' => $isupdate,
          'isdelete' => $isdelete,
          'cretime'  => date('Y-m-d H:i:s')
        
        );     

        $saved = $this->db->insert('detail_divisi', $inputdata2);
      }

      if ($saved){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{

      $form = array(

        'title'  => $title,
        'view'   => $viewid,
        'add'    => $addid,
        'update' => $updateid,
        'delete' => $deleteid
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }
  }
    
  function _edit_divisi(){

    $title = $this->input->post('title');
    $accview = $this->input->post('accview');
    $accadd = $this->input->post('accadd');
    $accupdate = $this->input->post('accupdate');
    $accdelete = $this->input->post('accdelete');

    $viewid = "";
    if (isset($accview) AND $accview != '') {
      foreach ($accview as $key => $value) {
        $viewid = $viewid.$key.";";
      }
      $viewid = substr($viewid, 0, -1);
    }
    
    $addid = "";
    if (isset($accadd) AND $accadd != '') {
      foreach ($accadd as $key => $value) {
        $addid = $addid.$key.";";
      }
      $addid = substr($addid, 0, -1);
    }
    
    $updateid = "";
    if (isset($accupdate) AND $accupdate != '') {
      foreach ($accupdate as $key => $value) {
        $updateid = $updateid.$key.";";
      }
      $updateid = substr($updateid, 0, -1);
    }

    $deleteid = "";
    if (isset($accdelete) AND $accdelete != '') {
      foreach ($accdelete as $key => $value) {
        $deleteid = $deleteid.$key.";";
      }
      $deleteid = substr($deleteid, 0, -1);
    }

    $notice = "";
    $success = true;

    if(isset($title) AND $title != ''){
    }else{
      $success = false;
      $notice .= "<li>Title : Must be filled</li>";
    }

    if(isset($accview) AND $accview != ''){
    }else{
      $success = false;
      $notice .= "<li>Access : Must choose 1 access page</li>";
    }

    if($success == true){

      $data = array();
      $inputdata = array(            

        'title'   => $title,
        'idmenu'   => $viewid,
        'modtime' => date('Y-m-d H:i:s')
      
      );     

      $this->db->where('id', $this->segs[5]);
      $edit = $this->db->update('divisi', $inputdata); 
      
      $menu = $this->db->query('SELECT id FROM `menu` order by cretime asc')->result_array();
      
      foreach ($menu as $idmenu) {

        $key = $idmenu['id'];

        if (isset($accview[$key]) AND $accview[$key] != "") {
          $isview = 1;
        }else{
          $isview = 0;
        }
        if (isset($accadd[$key]) AND $accadd[$key] != "") {
          $isadd = 1;
        }else{
          $isadd = 0;
        }
        if (isset($accupdate[$key]) AND $accupdate[$key] != "") {
          $isupdate = 1;
        }else{
          $isupdate = 0;
        }
        if (isset($accdelete[$key]) AND $accdelete[$key] != "") {
          $isdelete = 1;
        }else{
          $isdelete = 0;
        }
        
        $cekAksesmenu = $this->db->query('SELECT id FROM `detail_divisi` where idmenu = '.$key.' and iddivisi = '.$this->segs[5])->result();

        if (!$cekAksesmenu) {

          $inputdata2 = array(            

            'iddivisi' => $this->segs[5],
            'idmenu'   => $key,
            'isadd'    => $isadd,
            'isview'   => $isview,
            'isupdate' => $isupdate,
            'isdelete' => $isdelete,
            'cretime'  => date('Y-m-d H:i:s')
          
          );     

          $edit = $this->db->insert('detail_divisi', $inputdata2);

        }else{
          $idakses = $cekAksesmenu[0]->id;
          $inputdata2 = array( 

            'isview'   => $isview,
            'isadd'    => $isadd,
            'isupdate' => $isupdate,
            'isdelete' => $isdelete,
            'modtime'  => date('Y-m-d H:i:s')
          
          );     

          $this->db->where('id', $idakses);
          $edit = $this->db->update('detail_divisi', $inputdata2); 

        }
        
      }

      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{

      $form = array(

        'title'  => $title,
        'view'   => $viewid,
        'add'    => $addid,
        'update' => $updateid,
        'delete' => $deleteid
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }
      
  }
    
  public function user(){ 

    $login = $this->_isLogin();

    $permit = $this->_cekPermit(1);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');

          if (isset($form) AND $form == 1 ){

            $status = $this->_save_user();
            $data['status'] = $status;
          }

          $data_rec = $this->db->query('SELECT id,title FROM `divisi` where hapus = 0 and draft = 0 order by cretime asc')->result_array();

          $data['rec'] = $data_rec;  
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_user();
              $data['status'] = $status;
            }

            $data_rec = $this->db->query('SELECT id,title FROM `divisi` where hapus = 0 and draft = 0 order by cretime asc')->result_array();

            $data['rec'] = $data_rec;

            $data_user = $this->db->query('SELECT id,iddivisi,username,nama,pic FROM `user` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_user) {
              $data['user'] = $data_user[0];
            } else {
              redirect('/webadmin/user', 'refresh');
            }

          } else {
            redirect('/webadmin/user', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('user',$this->segs[5]);

            if ($deleted){

              redirect('/webadmin/user/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/user', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('user',$this->segs[5]);

            if ($restore){

              redirect('/webadmin/user/trash', 'refresh');

            }
          } else {
            redirect('/webadmin/user', 'refresh');
          }

        }elseif ($this->segs[4] == 'trash'){

          $this->_ispermit($permit->isdelete);

          $hide = $this->db->query('UPDATE user SET hapus = 1 WHERE id = "'.$this->segs[5].'"'); 
          
          if ($hide){

            redirect('/webadmin/user', 'refresh');

          }

        }else{
          redirect('/webadmin/user', 'refresh');
        }
      }else{
        redirect('/webadmin/user', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      if (isset($this->segs[3]) AND $this->segs[3] == 'trash') {
        $sqlwhere = 'and user.hapus = 1';
        $data['statuspage'] = 'trash';
      } else {
        $sqlwhere = 'and user.hapus = 0 and user.draft = 0';
        $data['statuspage'] = 'publish';
      }

      $data_rec = $this->db->query('SELECT user.id, user.nama, divisi.title as divisi FROM user INNER JOIN divisi ON user.iddivisi=divisi.id where 1=1 '.$sqlwhere.' order by user.cretime asc')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `user` where 1=1 '.$sqlwhere.' order by cretime asc')->result();        
      
      $data['rec']   = $data_rec;
      $data['active'] = 'user';
      $data['active2'] = '';
      $data['tipe'] = '';
      $data['act'] = 'default';
      $data['count_publish'] = $this->countPublish('user');
      $data['count_trash'] = $this->countTrash('user');
          
    }

    $data['active'] = 'user';
    $data['page'] = 'User';
    $data['tipe'] = '';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $this->load->view('cms/main.php',$data); 

  }
    
  function _save_user(){

    $username   = $this->input->post('username');
    $password   = $this->input->post('password');
    $repassword = $this->input->post('repassword');
    $fullname   = $this->input->post('fullname');
    $iddivisi   = $this->input->post('iddivisi');
    $pic        = $this->input->post('pic');

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;

    $cek_username = $this->db->query('SELECT count(*) as jumlah FROM `user` where username= "'.$username.'"')->result(); 

    if(!isset($username) OR $username == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Username : Must be filled</li>";
    }elseif ($cek_username[0]->jumlah == 1) {
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Username : Someone already has that username</li>";
    }

    if(!isset($password) OR $password == ''){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Password : Must be filled</li>";
    }elseif(!isset($repassword) OR $repassword == ''){
      $success = FALSE;
      $step1   = FALSE;
      $notice .= "<li>Re-Password : Must be filled</li>";
    }elseif($password != $repassword){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Password : Password and Re-Password must same</li>";
    }

    if(!isset($fullname) OR $fullname == ''){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Fullname : Must be filled</li>";
    }

    if(!isset($iddivisi) OR $iddivisi == '' OR !is_numeric($iddivisi)){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Divisi : Must be filled</li>";
    }

    $picname = "";

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '') {

      $folder       = 'user';
      $filename     = $username;
      $fieldname    = 'pic';
      $width        = 29;
      $height       = 29;
      $create_thumb = FALSE;
      $resizable    = TRUE;

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname = $hasilupload['filename'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname = "";
      }

    } 
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $inputdata = array(            

        'username' => $username,
        'nama'     => $fullname, 
        'iddivisi' => $iddivisi,
        'password' => sha1(MD5($password)),
        'pic'      => $picname,
        'cretime'  => date('Y-m-d H:i:s')

      
      );     

      $saved = $this->db->insert('user', $inputdata);
        
      if ($saved){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'username' => $username,
        'fullname' => $fullname,
        'iddivisi' => $iddivisi,
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
    
  function _edit_user(){

    $usernameold = $this->input->post('usernameold');
    $username    = $this->input->post('username');
    $password    = $this->input->post('password');
    $repassword  = $this->input->post('repassword');
    $fullname    = $this->input->post('fullname');
    $iddivisi    = $this->input->post('iddivisi');
    $picold      = $this->input->post('picold');
    $pic         = $this->input->post('pic');

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;

    if($usernameold != $username){

      $cek_username = $this->db->query('SELECT count(*) as jumlah FROM `user` where username= "'.$username.'"')->result(); 

      if ($cek_username[0]->jumlah == 1) {
        $success = FALSE;
        $step1   = FALSE;
        $notice  .= "<li>Username : Someone already has that username</li>";
      }

    }

    if(!isset($username) OR $username == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Username : Must be filled</li>";
    }

    if(!isset($fullname) OR $fullname == ''){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Fullname : Must be filled</li>";
    }

    if(!isset($iddivisi) OR $iddivisi == '' OR !is_numeric($iddivisi)){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Divisi : Must be filled</li>";
    }

    $picname = $picold;

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '') { 

      $folder       = 'user';
      $filename     = $username;
      $fieldname    = 'pic';
      $width        = 29;
      $height       = 29;
      $create_thumb = FALSE;
      $resizable    = TRUE;

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname = $hasilupload['filename'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname = $picold;
      }

    } 
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $editdata = array(            

        'username' => $username,
        'nama'     => $fullname, 
        'iddivisi' => $iddivisi,
        'pic'      => $picname,
        'modtime'  => date('Y-m-d H:i:s')

      
      );     

      $this->db->where('id', $this->segs[5]);
      $edit = $this->db->update('user', $editdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'username' => $username,
        'fullname' => $fullname,
        'iddivisi' => $iddivisi,
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }
  }
  
  public function instagram(){       

    $login = $this->_isLogin();

    $idmenudb = 14;

    $permit = $this->_cekPermit($idmenudb);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'tampil'){

          $this->_ispermit($permit->isupdate);

          $hide = $this->db->query('UPDATE user SET hapus = 1 WHERE id = "'.$this->segs[5].'"'); 
          
          if ($hide){

            redirect('/webadmin/instagram', 'refresh');

          }

        }else{
          redirect('/webadmin/instagram', 'refresh');
        }
      }else{
        redirect('/webadmin/instagram', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      $data_rec = $this->db->query('SELECT id,id_post,username,fullname,caption,thumbnail,small_picture,picture,video,type,status,created_time FROM instagram order by created_time DESC')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `instagram` order by created_time asc')->result();        
      
      $data['rec']   = $data_rec;
      $data['active'] = 'instagram';
      $data['active2'] = '';
      $data['tipe'] = '';
      $data['act'] = 'default';
          
    }

    $data['active'] = 'instagram';
    $data['page'] = 'Instagram';
    $data['tipe'] = '';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $this->load->view('cms/main.php',$data); 

  }

  public function homepage(){


    $login = $this->_isLogin();

    $idmenudb = 15;

    $permit = $this->_cekPermit($idmenudb);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');

          if (isset($form) AND $form == 1 ){

            $status = $this->_save_homepage();
            $data['status'] = $status;
          }
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_homepage();
              $data['status'] = $status;
            }

            // $data_row = $this->db->query('SELECT id,title,subtitle,pic,draft FROM `homepage` WHERE id = '.$this->segs[5])->result_array(); 

            // if ($data_row) {
            //   $data['row'] = $data_row[0];
            // } else {
            //   redirect('/webadmin/homepage', 'refresh');
            // }

          } else {
            redirect('/webadmin/homepage', 'refresh');
          }

        }elseif ($this->segs[4] == 'view'){

          $this->_ispermit($permit->isview);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $data_row = $this->db->query('SELECT id,title,subtitle,pic FROM `homepage` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_row) {
              $data['row'] = $data_row[0];
            } else {
              redirect('/webadmin/homepage', 'refresh');
            }

          } else {
            redirect('/webadmin/homepage', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('homepage',$this->segs[5]);

            if ($deleted){

              redirect('/webadmin/homepage', 'refresh');

            }
          } else {
            redirect('/webadmin/homepage', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('homepage',$this->segs[5]);

            if ($restore){

              redirect('/webadmin/homepage', 'refresh');

            }
          } else {
            redirect('/webadmin/homepage', 'refresh');
          }

        }elseif ($this->segs[4] == 'movetrash'){

          $this->_ispermit($permit->isdelete);

          $trash = $this->trashData('homepage',$this->segs[5]);
          
          if ($trash){

            redirect('/webadmin/homepage', 'refresh');

          }

        }elseif ($this->segs[4] == 'movedraft'){

          $this->_ispermit($permit->isupdate);

          $draft = $this->draftData('homepage',$this->segs[5]);
          
          if ($draft){

            redirect('/webadmin/homepage', 'refresh');

          }

        }elseif ($this->segs[4] == 'movepublish'){

          $this->_ispermit($permit->isupdate);

          $publish = $this->publishData('homepage',$this->segs[5]);
          
          if ($publish){

            redirect('/webadmin/homepage', 'refresh');

          }

        }else{
          redirect('/webadmin/homepage', 'refresh');
        }
      }else{
        redirect('/webadmin/homepage', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      //$data_rec = $this->db->query('SELECT id,pic,pi FROM `homepage` where id=1 and hapus = 0 and draft = 0 order by posisi asc')->result_array();  
      $data_row = $this->db->query('SELECT pic,pic2 FROM `homepage` WHERE id = 1')->result_array(); 

      if ($data_row) {
        $data['row'] = $data_row[0];
      } else {
        redirect('/webadmin/', 'refresh');
      }

      $form = $this->input->post('form');
      if (isset($form) AND $form == 1 ){

        $this->_ispermit($permit->isupdate);
        $status = $this->_edit_homepage();
        $data['status'] = $status;

      }
    
      $data['rec']        = $data_row[0];
      $data['active']     = 'homepage';
      $data['active2']    = '';
      $data['tipe']       = '';
      $data['act']        = 'default';
          
    }

    $data['active']  = 'homepage';
    $data['page']    = 'Home Page';
    $data['tipe']    = '';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $this->load->view('cms/main.php',$data); 

  }

  function _edit_homepage(){

    $pic      = $this->input->post('pic');
    $pic2     = $this->input->post('pic2');
    $old_pic  = $this->input->post('old_pic');
    $old_pic2 = $this->input->post('old_pic2');

    if(isset($publish) and $publish != '' and $publish == 'publish'){
      $statusdraft = 0;
    }else{
      $statusdraft = 1;
    }

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;
    
    $picname    = $old_pic;
    $picname2   = $old_pic2;

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'piclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'homepage';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = FALSE; 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'picportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'homepage';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 593;
      $height2       = 850;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' ) {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'piclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'homepage';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = FALSE; 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'picportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'homepage';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic';
      $resizable2    = TRUE;
      $width2        = 593;
      $height2       = 850;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload2($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'picportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'homepage';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $editdata = array(            

        'pic'   => $picname,
        'pic2' => $picname2,
        'modtime'   => date('Y-m-d H:i:s'),
        'modby'     => $this->session->userdata('username')

      );     

      $this->db->where('id', 1);
      $edit = $this->db->update('homepage', $editdata);
      // $saved = $this->db->insert('featurefilm', $inputdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        // 'title'     => $title,
        // 'director'  => $director,
        // 'summary'   => $summary,
        // 'content'   => $content,
        // 'trailer'   => $trailer,
        // 'startdate' => $startdate,
        // 'enddate'   => $enddate
        
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }

  public function aboutus(){


    $login = $this->_isLogin();

    $idmenudb = 7;

    $permit = $this->_cekPermit($idmenudb);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');

          if (isset($form) AND $form == 1 ){

            $status = $this->_save_aboutus();
            $data['status'] = $status;
          }
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_aboutus();
              $data['status'] = $status;
            }

            $data_row = $this->db->query('SELECT id,title,description,pic,pic2,thumb,datestart,dateend,draft FROM `aboutus` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_row) {
              $data['row'] = $data_row[0];
            } else {
              redirect('/webadmin/aboutus', 'refresh');
            }

          } else {
            redirect('/webadmin/aboutus', 'refresh');
          }

        }elseif ($this->segs[4] == 'view'){

          $this->_ispermit($permit->isview);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $data_row = $this->db->query('SELECT id,title,description,pic,pic2,thumb,datestart,dateend,draft FROM `aboutus` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_row) {
              $data['row'] = $data_row[0];
            } else {
              redirect('/webadmin/aboutus', 'refresh');
            }

          } else {
            redirect('/webadmin/aboutus', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('aboutus',$this->segs[5]);

            if ($deleted){

              redirect($this->agent->referrer(), 'refresh');

            }
          } else {
            redirect('/webadmin/aboutus', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('aboutus',$this->segs[5]);

            if ($restore){

              redirect($this->agent->referrer(), 'refresh');

            }
          } else {
            redirect('/webadmin/aboutus', 'refresh');
          }

        }elseif ($this->segs[4] == 'movetrash'){

          $this->_ispermit($permit->isdelete);

          $trash = $this->trashData('aboutus',$this->segs[5]);
          
          if ($trash){

            redirect($this->agent->referrer(), 'refresh');

          }

        }elseif ($this->segs[4] == 'movedraft'){

          $this->_ispermit($permit->isupdate);

          $draft = $this->draftData('aboutus',$this->segs[5]);
          
          if ($draft){

            redirect($this->agent->referrer(), 'refresh');

          }

        }elseif ($this->segs[4] == 'movepublish'){

          $this->_ispermit($permit->isupdate);

          $publish = $this->publishData('aboutus',$this->segs[5]);
          
          if ($publish){

            redirect($this->agent->referrer(), 'refresh');

          }

        }else{
          redirect('/webadmin/aboutus', 'refresh');
        }
      }else{
        redirect('/webadmin/aboutus', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      $datenow = date('Y-m-d H:i:s');

      if (isset($this->segs[3]) AND $this->segs[3] == 'trash') {
        $sqlwhere = 'and hapus = 1';
        $data['statuspage'] = 'trash';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'draft') {
        $sqlwhere = 'and hapus = 0 and draft = 1';
        $data['statuspage'] = 'draft';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'scheduling') {
        $sqlwhere = "and hapus = 0 and draft = 0 and datestart >= '".$datenow."'";
        $data['statuspage'] = 'scheduling';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'expired') {
        $sqlwhere = "and hapus = 0 and draft = 0 and dateend <= '".$datenow."'";
        $data['statuspage'] = 'expired';
      }else {
        $sqlwhere = "and hapus = 0 and draft = 0 and datestart <= '".$datenow."' and dateend >= '".$datenow."'";
        $data['statuspage'] = 'publish';
      }

      $data_rec = $this->db->query('SELECT id,title,description,thumb,pic,datestart,dateend FROM `aboutus` where 1=1 '.$sqlwhere.' order by posisi asc')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `aboutus` where 1=1 '.$sqlwhere.' order by posisi asc')->result();        
      
      $data['rec']        = $data_rec;
      $data['active']     = 'aboutus';
      $data['active2']    = '';
      $data['tipe']       = '';
      $data['act']        = 'default';
      $data['jumlahdata'] = $data_count[0]->jumlah;

      $data['count_publish']    = $this->countPublishdate('aboutus');
      $data['count_scheduling'] = $this->countScheduling('aboutus');
      $data['count_expired']    = $this->countExpired('aboutus');
      $data['count_draft']      = $this->countDraft('aboutus');
      $data['count_trash']      = $this->countTrash('aboutus');
          
    }
    
    $data['submenu']   = FALSE;
    $data['active']    = 'aboutus';
    $data['page']      = 'About Us';
    $data['tipe']      = '';
    $data['activesub'] = 'aboutus';
    $data['pagesub']   = 'About Us';

    $this->load->view('cms/main.php',$data); 

  }

  function _save_aboutus(){

    $title     = $this->input->post('title');
    $desc      = $this->input->post('desc');
    $pic       = $this->input->post('pic');
    $pic2      = $this->input->post('pic2');
    $startdate = $this->input->post('startdate');
    $enddate   = $this->input->post('enddate');
    $draft     = $this->input->post('draft');
    $publish   = $this->input->post('publish');

    if(isset($publish) and $publish != '' and $publish == 'publish'){
      $statusdraft = 0;
    }else{
      $statusdraft = 1;
    }

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;

    //$cek_username = $this->db->query('SELECT count(*) as jumlah FROM `user` where username= "'.$username.'"')->result(); 

    if(!isset($desc) OR $desc == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Description : Must be filled</li>";
    }
    
    $picname    = "";
    $picname2    = "";
    $thumbname = "";

    if(!isset($enddate) OR $enddate == ''){
      $enddate = '9999-12-31 23:59:59';
    }
    if(!isset($startdate) OR $startdate == ''){
      $startdate = date('Y-m-d H:i:s');
    }
    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'desclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'aboutus';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 137, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' ) {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'desclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'aboutus';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 137, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrtait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload2($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }
    
    
    if($step1 == TRUE AND $success == TRUE){

      $posisi = $this->db->count_all('aboutus');
      $posisi = $posisi+1;

      $data = array();
      $inputdata = array(            

        'title'       => $title,
        'description' => $desc,
        'draft'       => $statusdraft,
        'pic'         => $picname,
        'pic2'        => $picname2,
        'thumb'       => $thumbname,
        'posisi'      => $posisi,
        'datestart'   => $startdate,
        'dateend'     => $enddate,
        'cretime'     => date('Y-m-d H:i:s'),
        'creby'       => $this->session->userdata('username')

      );     

      $saved = $this->db->insert('aboutus', $inputdata);
        
      if ($saved){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'desc'      => $desc,
        'startdate' => $startdate,
        'enddate'   => $enddate
        
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }

  function _edit_aboutus(){
    
    $title     = $this->input->post('title');
    $desc      = $this->input->post('desc');
    $startdate = $this->input->post('startdate');
    $enddate   = $this->input->post('enddate');
    $pic       = $this->input->post('pic');
    $pic2      = $this->input->post('pic2');
    $old_pic   = $this->input->post('old_pic');
    $old_pic2  = $this->input->post('old_pic2');
    $oldthumb  = $this->input->post('oldthumb');
    $draft     = $this->input->post('draft');
    $publish   = $this->input->post('publish');

    if(isset($publish) and $publish != '' and $publish == 'publish'){
      $statusdraft = 0;
    }else{
      $statusdraft = 1;
    }

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;

    if(!isset($desc) OR $desc == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Description : Must be filled</li>";
    }

    $picname    = $old_pic;
    $picname2   = $old_pic2;
    $thumbname = $oldthumb;

    if(!isset($enddate) OR $enddate == ''){
      $enddate = '9999-12-31 23:59:59';
    }
    if(!isset($startdate) OR $startdate == ''){
      $startdate = date('Y-m-d H:i:s');
    }

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'desclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'aboutus';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 137, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '' ) {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'desclandscape_'.$random_digit."_".$file_edit;

      $folder       = 'aboutus';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 1366;
      $height       = 699;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 137, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname    = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname  = "";
      }

      $filenameold2   = strtolower($_FILES['pic']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrtait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload2($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }elseif ($step1 == TRUE AND isset($_FILES['pic2']['name']) AND $_FILES['pic2']['name'] != '') {

      $filenameold2   = strtolower($_FILES['pic2']['name']);
      $file_edit2     = str_replace(" ","_",$filenameold2);
      $random_digit2  = rand(000,999);
      $new_file_name2 = 'descportrait_'.$random_digit2."_".$file_edit2;

      $folder2       = 'aboutus';
      $filename2     = $new_file_name2;
      $fieldname2    = 'pic2';
      $resizable2    = TRUE;
      $width2        = 740;
      $height2       = 1061;
      $create_thumb2 = FALSE;

      $hasilupload2 = $this->ryan_img_upload($folder2,$filename2,$fieldname2,$width2,$height2,$create_thumb2,$resizable2);

      if($hasilupload2['status'] == TRUE){
        $picname2   = $hasilupload2['filename'];
      }else{
        $success = $hasilupload2['success'];
        $step1   = $hasilupload2['step1'];
        $notice  .= $hasilupload2['notice'];
        $picname2 = "";
      }

    }
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $editdata = array(            

        'title'       => $title,
        'description' => $desc,
        'draft'       => $statusdraft,
        'pic'         => $picname,
        'pic2'        => $picname2,
        'thumb'       => $thumbname,
        'datestart'   => $startdate,
        'dateend'     => $enddate,
        'modtime'   => date('Y-m-d H:i:s'),
        'modby'     => $this->session->userdata('username')

      );     

      $this->db->where('id', $this->segs[5]);
      $edit = $this->db->update('aboutus', $editdata);
      // $saved = $this->db->insert('featurefilm', $inputdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'desc'     => $desc,
        'startdate' => $startdate,
        'enddate'   => $enddate
        
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
  

  public function termsconditions(){


    $login = $this->_isLogin();

    $idmenudb = 25;

    $permit = $this->_cekPermit($idmenudb);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();

    $this->_ispermit($permit->isview);

    $data_rec = $this->db->query('SELECT id,isi FROM `terms` where id=1 and hapus = 0 and draft = 0')->result_array();  
  
    $data['rec']        = $data_rec[0];
    $data['act']        = 'default';
          

    $data['active']  = 'termsconditions';
    $data['page']    = 'Terms & Conditions';
    $data['tipe']    = '';
    $data['active2'] = '';
    $data['submenu'] = FALSE;

    $form = $this->input->post('form');
    if (isset($form) AND $form == 1 ){

      $status = $this->_edit_terms();
      $data['status'] = $status;

    }

    $this->load->view('cms/main.php',$data); 

  }

  function _edit_terms(){

    $isi     = $this->input->post('isi');

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;

    if(!isset($isi) OR $isi == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Content : Must be filled</li>";
    } 
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $editdata = array(            

        'isi'     => $isi,
        'modtime' => date('Y-m-d H:i:s'),
        'modby'   => $this->session->userdata('username')

      );     

      $this->db->where('id', 1);
      $edit = $this->db->update('terms', $editdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'isi'     => $isi,
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }

  public function clients(){


    $login = $this->_isLogin();

    $idmenudb = 7;

    $permit = $this->_cekPermit($idmenudb);

    $data['permit'] = $permit;
        
    $data['menulist'] = $this->_cekAkses();
      
    if (isset($this->segs[3]) AND $this->segs[3] == 'act'){           

      if (isset($this->segs[4])){

        $data['act'] = $this->segs[4];

        if ($this->segs[4] == 'add'){

          $this->_ispermit($permit->isadd);

          $form = $this->input->post('form');

          if (isset($form) AND $form == 1 ){

            $status = $this->_save_clients();
            $data['status'] = $status;
          }
        
        }elseif ($this->segs[4] == 'edit'){

          $this->_ispermit($permit->isupdate);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $form = $this->input->post('form');
            if (isset($form) AND $form == 1 ){

              $status = $this->_edit_clients();
              $data['status'] = $status;
            }

            $data_row = $this->db->query('SELECT id,title,pic,thumb,datestart,dateend,draft FROM `clients` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_row) {
              $data['row'] = $data_row[0];
            } else {
              redirect('/webadmin/clients', 'refresh');
            }

          } else {
            redirect('/webadmin/clients', 'refresh');
          }

        }elseif ($this->segs[4] == 'view'){

          $this->_ispermit($permit->isview);

          if (isset($this->segs[5]) AND $this->segs[5] != '' AND is_numeric($this->segs[5])) {

            $data_row = $this->db->query('SELECT id,title,link,pic,thumb,datestart,dateend,draft FROM `clients` WHERE id = '.$this->segs[5])->result_array(); 

            if ($data_row) {
              $data['row'] = $data_row[0];
            } else {
              redirect('/webadmin/clients', 'refresh');
            }

          } else {
            redirect('/webadmin/clients', 'refresh');
          }

        }elseif ($this->segs[4] == 'delete'){
          
          $this->_ispermit($permit->isdelete);
          
          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $deleted = $this->deleteData('clients',$this->segs[5]);

            if ($deleted){

              redirect($this->agent->referrer(), 'refresh');

            }
          } else {
            redirect('/webadmin/clients', 'refresh');
          }

        }elseif ($this->segs[4] == 'restore'){
          
          $this->_ispermit($permit->isdelete);

          if (isset($this->segs[5]) AND $this->segs[5] != '') {
            
            $restore = $this->restoreData('clients',$this->segs[5]);

            if ($restore){

              redirect($this->agent->referrer(), 'refresh');

            }
          } else {
            redirect('/webadmin/clients', 'refresh');
          }

        }elseif ($this->segs[4] == 'movetrash'){

          $this->_ispermit($permit->isdelete);

          $trash = $this->trashData('clients',$this->segs[5]);
          
          if ($trash){

            redirect($this->agent->referrer(), 'refresh');

          }

        }elseif ($this->segs[4] == 'movedraft'){

          $this->_ispermit($permit->isupdate);

          $draft = $this->draftData('clients',$this->segs[5]);
          
          if ($draft){

            redirect($this->agent->referrer(), 'refresh');

          }

        }elseif ($this->segs[4] == 'movepublish'){

          $this->_ispermit($permit->isupdate);

          $publish = $this->publishData('clients',$this->segs[5]);
          
          if ($publish){

            redirect($this->agent->referrer(), 'refresh');

          }

        }else{
          redirect('/webadmin/clients', 'refresh');
        }
      }else{
        redirect('/webadmin/clients', 'refresh');
      }

    }else{

      $this->_ispermit($permit->isview);

      $datenow = date('Y-m-d H:i:s');

      if (isset($this->segs[3]) AND $this->segs[3] == 'trash') {
        $sqlwhere = 'and hapus = 1';
        $data['statuspage'] = 'trash';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'draft') {
        $sqlwhere = 'and hapus = 0 and draft = 1';
        $data['statuspage'] = 'draft';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'scheduling') {
        $sqlwhere = "and hapus = 0 and draft = 0 and datestart >= '".$datenow."'";
        $data['statuspage'] = 'scheduling';
      }elseif (isset($this->segs[3]) AND $this->segs[3] == 'expired') {
        $sqlwhere = "and hapus = 0 and draft = 0 and dateend <= '".$datenow."'";
        $data['statuspage'] = 'expired';
      }else {
        $sqlwhere = "and hapus = 0 and draft = 0 and datestart <= '".$datenow."' and dateend >= '".$datenow."'";
        $data['statuspage'] = 'publish';
      }

      $data_rec = $this->db->query('SELECT id,title,thumb,pic,datestart,dateend FROM `clients` where 1=1 '.$sqlwhere.' order by cretime desc')->result_array();  

      $data_count = $this->db->query('SELECT count(*) as jumlah FROM `clients` where 1=1 '.$sqlwhere.' order by cretime desc')->result();        
      
      $data['rec']        = $data_rec;
      $data['active']     = 'clients';
      $data['active2']    = '';
      $data['tipe']       = '';
      $data['act']        = 'default';
      $data['jumlahdata'] = $data_count[0]->jumlah;

      $data['count_publish']    = $this->countPublishdate('clients');
      $data['count_scheduling'] = $this->countScheduling('clients');
      $data['count_expired']    = $this->countExpired('clients');
      $data['count_draft']      = $this->countDraft('clients');
      $data['count_trash']      = $this->countTrash('clients');
          
    }
    
    $data['submenu']   = FALSE;
    $data['active']    = 'clients';
    $data['page']      = 'Clients';
    $data['tipe']      = '';
    $data['activesub'] = 'clients';
    $data['pagesub']   = 'List Banner';

    $this->load->view('cms/main.php',$data); 

  }

  function _save_clients(){

    $title     = $this->input->post('title');
    $pic       = $this->input->post('pic');
    $draft     = $this->input->post('draft');
    $publish   = $this->input->post('publish');

    if(isset($publish) and $publish != '' and $publish == 'publish'){
      $statusdraft = 0;
    }else{
      $statusdraft = 1;
    }

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;


    if(!isset($title) OR $title == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Title : Must be filled</li>";
    }

    $picname   = "";
    $thumbname = "";

    if(!isset($startdate) OR $startdate == ''){
      $startdate = date('Y-m-d H:i:s');
    }

    if(!isset($enddate) OR $enddate == ''){
      $enddate = '9999-12-31 23:59:59';
    }

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '') {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'client_'.$random_digit."_".$file_edit;

      $folder       = 'clients';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 290;
      $height       = 146;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 139, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname   = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname = "";
      }

    } 
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $inputdata = array(            

        'title'     => $title,
        'datestart' => $startdate,
        'dateend'   => $enddate,
        'draft'     => $statusdraft,
        'pic'       => $picname,
        'thumb'     => $thumbname,
        'cretime'   => date('Y-m-d H:i:s'),
        'creby'     => $this->session->userdata('username')

      );     

      $saved = $this->db->insert('clients', $inputdata);
        
      if ($saved){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'title'     => $title,
        'startdate' => $startdate,
        'enddate'   => $enddate
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
  function _edit_clients(){

    $title     = $this->input->post('title');
    $pic       = $this->input->post('pic');
    $old_pic   = $this->input->post('old_pic');
    $old_thumb = $this->input->post('old_thumb');
    $draft     = $this->input->post('draft');
    $publish   = $this->input->post('publish');

    if(isset($publish) and $publish != '' and $publish == 'publish'){
      $statusdraft = 0;
    }else{
      $statusdraft = 1;
    }

    $notice  = "";
    $success = TRUE;
    $step1   = TRUE;


    if(!isset($title) OR $title == ""){
      $success = FALSE;
      $step1   = FALSE;
      $notice  .= "<li>Title : Must be filled</li>";
    }

    $picname   = $old_pic;
    $thumbname = $old_thumb;

    if(!isset($startdate) OR $startdate == ''){
      $startdate = date('Y-m-d H:i:s');
    }

    if(!isset($enddate) OR $enddate == ''){
      $enddate = '9999-12-31 23:59:59';
    }

    if ($step1 == TRUE AND isset($_FILES['pic']['name']) AND $_FILES['pic']['name'] != '') {

      $filenameold   = strtolower($_FILES['pic']['name']);
      $file_edit     = str_replace(" ","_",$filenameold);
      $random_digit  = rand(000,999);
      $new_file_name = 'client_'.$random_digit."_".$file_edit;

      $folder       = 'clients';
      $filename     = $new_file_name;
      $fieldname    = 'pic';
      $resizable    = TRUE;
      $width        = 290;
      $height       = 146;
      $create_thumb = array(            

        'status' => TRUE,
        'width'  => 139, 
        'height' => 70

      ); 

      $hasilupload = $this->ryan_img_upload($folder,$filename,$fieldname,$width,$height,$create_thumb,$resizable);

      if($hasilupload['status'] == TRUE){
        $picname   = $hasilupload['filename'];
        $thumbname = $hasilupload['thumbname'];
      }else{
        $success = $hasilupload['success'];
        $step1   = $hasilupload['step1'];
        $notice  .= $hasilupload['notice'];
        $picname = "";
      }

    } 
    
    
    if($step1 == TRUE AND $success == TRUE){

      $data = array();
      $editdata = array(            

        'title'     => $title,
        'datestart' => $startdate,
        'dateend'   => $enddate,
        'draft'     => $statusdraft,
        'pic'       => $picname,
        'thumb'     => $thumbname,
        'cretime'   => date('Y-m-d H:i:s'),
        'creby'     => $this->session->userdata('username')

      );     

      $this->db->where('id', $this->segs[5]);
      $edit = $this->db->update('clients', $editdata);
        
      if ($edit){

        $info = array(            

          'notice'  => $notice,
          'success' => $success
        
        );
        return $info;

      }else{

        $info = array(            

          'notice'  => "<li>Terjadi kesalahan sistem silahkan coba lagi</li>",
          'success' => false
        
        );
        return $info;

      }

    }else{
      $form = array(

        'title'     => $title,
        'startdate' => $startdate,
        'enddate'   => $enddate
      
      );

      $info = array(            

        'notice'  => $notice,
        'success' => $success,
        'form'    => $form
      
      );
      return $info;
    }

  }
}
?>